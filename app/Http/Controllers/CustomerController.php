<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Ticket;
use App\Mail\TicketMail;
use Mail;

class CustomerController extends Controller
{
    function index()
    {
        $session = Session('customer');
        $id = $session->id;

        $tickets = Ticket::where('user_id',  '=',  $id)->get();

        return view('index')
                ->withTickets($tickets);
    }

    function open()
    {
        return view('ticket.open');
    }
    function store(Request $request)
    {
        $session = Session('customer');
        $id = $session->id;

        $request->validate([
            'email' => 'required|email',
            'subject' => 'required',
            'details' => 'required',
        ]);

        $ticket = new Ticket;
        $ticket->user_id = $id;
        $ticket->email = $request->email;
        $ticket->subject = $request->subject;
        $ticket->details = $request->details;
        $ticket->status = 1;
        $ticket->save();

        if($ticket->save())
        {
            $data = [
                'subject' => $request->subject,
                'details' => $request->details
            ];

            Mail::to('mahibulislam404@gmail.com')->send(new TicketMail($data));

            return redirect(route('index'))
            ->with('success','You submitted a Ticket.');
        }
        else
        {
            return redirect(route('index'))
            ->with('error','Ticket Submiting Failed.');
        }
        
    }
}
