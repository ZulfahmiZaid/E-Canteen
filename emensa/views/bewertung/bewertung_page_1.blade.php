@extends("bewertung.bewertung_layout")

@section("cssExtra")
    <script src="https://kit.fontawesome.com/4bafb4d0bb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/bewertung_main.css">
@endsection

@section("FoodDesc")
    <h1>{{$gerichtData[0]["name"]}}</h1>
    <div class="FoodImg" style="background-image: url('../img/{{$gerichtData[0]['image']}}')"></div>
@endsection

@section("UserFeedback")
    <div class="FeedbackForm">
    <form method="post" action="/bewertung_verifizieren">
        <div class="Radio">
        <label for="sterne">Stars: </label>

        <input name="sterne" id="sehr schlecht" type="radio" value="gross" required>
        <label for="sehr schlecht">gross</label>

        <input name="sterne" id="schlecht" type="radio" value="bad" required>
        <label for="schlecht">bad</label>

        <input name="sterne" id="mittel" type="radio" value="normal" required>
        <label for="mittel">normal</label>

        <input name="sterne" id="gut" type="radio" value="good" required>
        <label for="gut">good</label>

        <input name="sterne" id="sehr gut" type="radio" value="delicious" required>
        <label for="sehr gut">delicious</label>
        </div>
        <textarea name="kommentare" id="kommentare" maxlength = "200"
                  minlength="5" rows="5" placeholder="Your Opinion..."></textarea>
        <div class="SterneUndSubmit">
            <input type="submit" value="Submit">
        </div>
    </form>
    </div>
@endsection

@section("last30")
    <h1>Reviews</h1>
    <div class="Comments">
        @foreach($last30 as $value)
            <div class="AllUser">
                <div class="Icon">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="NameAndComment">
                    <p>
                        <b>Name:</b> &nbsp;{{$value['user']}} &nbsp;
                        @if($_SESSION["admin"])
                            @if($value["hervorgehoben"])
                                <a href="/bewertung_to_unhighlight?bewertungID={{$value['bewertung_id']}}"
                                style="color: #e01f1f">
                                    Unhighlight
                                </a>
                            @else
                                <a href="/bewertung_to_highlight?bewertungID={{$value['bewertung_id']}}"
                                style="color: darkcyan">
                                    Hightlight
                                </a>
                            @endif
                        @endif
                    </p>
                    <p>
                        <b>Rating:</b> &nbsp;{{$value['stern']}}<br>
                        {{$value['description']}}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="OwnReviews">
        <a href="/meinebewertungen">My Reviews</a>
    </div>
@endsection