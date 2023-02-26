@extends("bewertung.own_bewertung")

@section("cssExtra")
    <script src="https://kit.fontawesome.com/4bafb4d0bb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/own_bewertung.css">

    <script src="/js/jquery-3.6.2.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
@endsection

@section("benutzer")
    <div class="Card">
        <div class="UserData">
            <p class="Return">
                <a href="/bewertung?gerichtID={{$_SESSION['auswahl']}}"><i class="fa-solid fa-reply"></i></a>
                <a href="/hauptseite_Emensa"><i class="fa-solid fa-house"></i></a>
            </p>
            <div class="Circle">
                <i class="fa-solid fa-user"></i> <br>
                <p>{{$_SESSION['angemeldet']}}</p>
            </div>
        </div>
        <div class="UserRating">
            <table class="Scrollable">
                <thead>
                    <tr>
                        <th>Meals</th>
                        <th>Reviews</th>
                        <th>Stars</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
            @foreach($bewertungen as $value)
                <tr class="Data">
                    <!--
                     <td><input type="checkbox" name="toDelete[]" value="$value["bewertung_id"]"></td>
                     -->
                    <td>{{$value['gerichtname']}}</td>
                    <td>{{$value['description']}}</td>
                    <td>{{$value['stern']}}</td>
                    <td><a href="/bewertung_to_delete?bewertungID={{$value["bewertung_id"]}}">Delete</a></td>
                </tr>
            @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection