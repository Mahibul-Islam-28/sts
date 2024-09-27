@extends('admin.layout.main')
@section('css')
<link rel="stylesheet" href="{{asset('')}}css/ticket.css">
@endsection

@section('content')
<section class="main-content">

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

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

    </div>

    <div class="form-section">
        <h3>Ticket Respond</h3>
        <form method="post" id="ticket-form" class="needs-validation" novalidate  enctype="multipart/form-data">
            @csrf

            <div class="form-group my-2">
                <label for="name">Respond</label>
                <textarea name="respond" id="respond" class="form-control" placeholder="Enter Respond" required>{{$ticket->respond}}</textarea>
                <div class="invalid-feedback">Please Enter Ticket Respond!</div>
            </div>
            
            <div class="button-part">
                <input type="submit" class="submit-btn" value="Submit">
            </div>
        </form>

    </div>


</section>
@endsection

@section('js')
<script>
(() => {
  'use strict'

  const forms = document.querySelectorAll('.needs-validation')

  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
</script>
