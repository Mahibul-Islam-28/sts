@extends('layout.main')
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
        <h3>Open A Ticket</h3>
        <form method="post" id="ticket-form" class="needs-validation" novalidate  enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter Your Email" name="email" required>
                <div class="invalid-feedback">Please Enter Your Email!</div>
            </div>

            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" id="subject" placeholder="Enter Ticket Subject" name="subject" required>
                <div class="invalid-feedback">Please Enter Ticket Subject!</div>
            </div>

            <div class="form-group my-2">
                <label for="name">Details</label>
                <textarea name="details" id="details" class="form-control" placeholder="Enter Details" required></textarea>
                <div class="invalid-feedback">Please Enter Ticket Details!</div>
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
