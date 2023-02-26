@extends('signup.signup_main')

@section('cssExtra')
    <script src="https://kit.fontawesome.com/4bafb4d0bb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/signup_data_styles.css">
@endsection

@section('newdata')
    <p class="Return">
        <a href="/anmeldung"><i class="fa-solid fa-reply"></i></a>
        <a href="/hauptseite_Emensa"><i class="fa-solid fa-house"></i></a>
    </p>
    <fieldset>
        <legend>Register</legend>
        @if(@isset($_SESSION['signup_error']))
            <p>{{$_SESSION['signup_error']}}</p>
            @unset($_SESSION['signup_error'])
        @endif
        <form class="Signup" method="post" action="/call_verify_signup">
            <label for="new_username">Username: </label><br>
            <input id="new_username" type="text" name="new_username" placeholder="max 8 characters" maxlength="8" required> <br>

            <label for="new_email">Email: </label><br>
            <input id="new_email" type="email" name="new_email" placeholder="Your Email Address" required> <br>

            <label for="new_password">Password: </label><br>
            <input id="new_password" type="password" name="new_password" placeholder="max 15 characters" maxlength="15" required> <br>

            <input type="submit" value="Sign up">
        </form>
    </fieldset>
@endsection