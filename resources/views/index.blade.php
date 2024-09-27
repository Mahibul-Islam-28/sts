@extends('layout.main')

@section('content')
<section class="main-content">
    <div class="container">

        <div class="alert-section">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>{{ $message }}</strong>
            </div>
            @endif

            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
        </div>

        <h3 class="text-center mt-5 mb-2">My Ticket List</h3>
        <div class="text-end mb-3 mt-3">
            <a href="{{route('openTicket')}}" class="create-btn mb-3">Open Ticket +</a>
        </div>

        <div class="table-responsive mt-3">
            <table class="table table-bordered table-striped pt-3">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Details</th>
                        <th>Respond</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($tickets as $ticket)
                    <tr>
                        <td>{{$ticket->subject}}</td>
                        <td>{{$ticket->details}}</td>
                        <td>{{$ticket->respond}}</td>
                        @if($ticket->status == 1)
                        <td><span class="text-success">Active</span></td>
                        @elseif($ticket->status == 0)
                        <td><span class="text-danger">Closed</span></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        
    </div>
</section>
@endsection
