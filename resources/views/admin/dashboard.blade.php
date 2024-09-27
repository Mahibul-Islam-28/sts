@extends('admin.layout.main')
@section('css')
<link rel="stylesheet" href="{{asset('')}}css/admin/dashboard.css">
@endsection
@section('content')
<section class="main-content">
    <div class="container">

        <h3 class="mb-3 mt-5 text-center">Ticket List</h3>
        <div class="table-responsive mt-5">
            <table class="table table-bordered table-striped pt-3" id="myTable">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Details</th>
                        <th>Respond</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($tickets as $ticket)
                    <tr>
                        <td>{{$ticket->subject}}</td>
                        <td>{{$ticket->details}}</td>
                        <td>{{$ticket->respond}}</td>
                        <td>
                            @if($ticket->status == 1)
                            <span class="text-success">Active</span>
                            @elseif($ticket->status == 0)
                            <span class="text-danger">Closed</span>
                            @endif
                        </td>
                        <td>
                            <a class="button" href="{{route('addRespond', $ticket->id)}}">Add Respond</a>

                            @if($ticket->status == 1)
                            <button class="button" id="closeBtn-{{$ticket->id}}" onClick="closeTicket({{$ticket->id}})">Close</button>
                            @endif
                        </td>

                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</section>
@endsection
