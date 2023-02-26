@extends("anmeldung.anmeldung_layout")

@section("formElements")
<input id="benutzer_name" name="benutzer_name" type="text" value="" placeholder="username" required> <br>
<input id="email" name="email" type="email" value="" placeholder="email" required> <br>
<input id="passwort" name="passwort" type="password" value="" placeholder="password"> <br>
    <input type="submit" value="Submit">
    @if(!is_null($fehler))
        <p class="Fehler">{{$fehler}}</p>
    @endif
@endsection