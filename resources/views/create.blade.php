@extends('layout')
@section('content')
<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
    .error-message {
      color: red;
      font-size: 12px;
    }
</style>
<div class="card push-top">
  <div class="card-header">
    Add User
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form id="create-form" method="post" action="{{ route('learners.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" />
              <span class="error-message" id="name-error"></span>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email" />
              <span class="error-message" id="email-error"></span>
          </div>
          <div class="form-group">
              <label for="phone">Phone</label>
              <input type="tel" class="form-control" name="phone" id="phone" />
              <span class="error-message" id="phone-error"></span>
          </div>
          
          <button type="submit" class="btn btn-block btn-danger">Create User</button>
      </form>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('#create-form').submit(function(event) {
      event.preventDefault(); 
      
      
      $('.error-message').text('');
      
  
      var name = $('#name').val();
      var email = $('#email').val();
      var phone = $('#phone').val();
      var password = $('#password').val();
      
    
      var isValid = true;
      
      if (name.trim() === '') {
        $('#name-error').text('Please enter a name.');
        isValid = false;
      }
      
      if (email.trim() === '' || email.indexOf('@') === -1) {
        $('#email-error').text('Please enter a valid email.');
        isValid = false;
      }
      
      if (phone.trim() === '' || !(/^\d{10}$/.test(phone))) {
        $('#phone-error').text('Please enter a 10-digit phone number.');
        isValid = false;
      }
      
   
      
      if (isValid) {
        this.submit();
      }
    });
  });
</script>
@endsection
