<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Ticket;
use App\Mail\TicketMail;
use Mail;

class AdminController extends Controller
{
    function dashboard()
    {
        $tickets = Ticket::all();

        return view('admin.dashboard')
                ->withTickets($tickets);
    }

    function respond($id)
    {
        $ticket = Ticket::find($id);
        if($ticket)
        {
            return view('admin.ticket.respond')
                ->withTicket($ticket);
        }
        else
        {
            return back()
                ->with('error','No Ticket Found.');
        }
    }
    function update(Request $request,  $id)
    {
        $ticket = Ticket::find($id);

        if($ticket)
        {
            $ticket->respond = $request->respond;
            $ticket->update();

            return redirect(route('dashboard'))
            ->with('success','You Created a Respond.');
        }
        else
        {
            return back()
                ->with('error','No Ticket Found.');
        }
        
    }

    // Ajax
    function closeTicket(Request $request)
    {
        if($request->ajax())
        {
            $id = $request->get('id');

            $ticket = Ticket::find($id);
            
            if($ticket)
            {
                $ticket->status = 0;
                $ticket->update();

                $data = [
                    'subject' => "Closing Ticket",
                    'details' => "Admin Has Close your Ticket."
                ];
    
                Mail::to($ticket->email)->send(new TicketMail($data));
                
            }

            return true;
        }
    }
}
