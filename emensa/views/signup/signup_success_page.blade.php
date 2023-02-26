@extends('signup.signup_main')

@section('cssExtra')
    <link rel="stylesheet" href="/css/signup_success_styles.css">
    <script src="https://kit.fontawesome.com/4bafb4d0bb.js" crossorigin="anonymous"></script>
@endsection
@section('successful')
    <div class="SuccessMessage">
        <p>Thank you!</p>
        <p><a href="/anmeldung">Login</a></p>
    </div>
@endsection