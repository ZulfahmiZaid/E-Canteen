@extends('hauptseite.hauptseite_layout')

@section("Navigation")
    <a href="#IntroAndCounter">About</a>
    <a href="#IntroAndCounter">Statistic</a>
    <a href="#FormAndQuotes">Newsletter</a>
    <a href="#FormAndQuotes">Moto</a>
    @if($angemeldet !== null)
        <a href="/abmeldung">Logout</a>
        <span>{{$angemeldet}}</span>
    @else
        <a href="/anmeldung">Login</a>
        @endif
@endsection

@section("foodDetails")
    @foreach($foods as $food_details)
    <div class="slide">
        <div class="slide-element" style="background-image:
    url('../img/{{$food_details['image']}}');">
        <div class="Description">
            <p>{{$food_details['description']}}</p>
            <p class="Price"> Price : {{$food_details['price']}} Euro</p>
        </div>
        <div class="Ratings">
            <div class="Stars">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </div>
            <div class="Feedbacks">
                <ul class="Comments">
                   @foreach($reviews as $comments)
                       @if($comments['gericht_id'] == $food_details['id'])
                           <li>"{{$comments['description']}}" <br>
                               by: &nbsp {{$comments['user']}}</li>
                        @endif
                    @endforeach
                </ul>
                <p><a class="Bewerten" href="/bewertung?gerichtID={{$food_details['id']}}">Review</a></p>
            </div>
        </div>
        </div>
    </div>
    @endforeach
@endsection

@section("Counters")
    <div class="Besucher"><p class="Number">{{$counter['besucher']}}</p><p>Visitors</p></div>
    <div class="NW-Anmeldungen"><p class="Number">{{$counter['newsletter_Abo']}}</p><p>Newsletter</p></div>
    <div class="AnzahlSpeisen"><p class="Number">{{$counter['speisen']}}</p><p>Meals</p></div>
@endsection

@section("NewsletterForm")
    <h2>Become A Member!</h2>
    @if(isset($_SESSION['member']))
        <p class="AlertNewsletter">Alert : &nbsp;
        @if($_SESSION["member"] === false)
            <span class="Subscribed">Thank you for subscribing :D</span>
        @else
            <span class="AlreadyMember">You are already a member!
                &nbsp; Your Member-ID: {{$_SESSION['member_ID']}}</span>
        @endif
        </p>
        @unset($_SESSION['member'])
    @endif
<form class="NW" method="post" action="/subscribe">
    <input id="NW-name" name="NW-name" type="text" placeholder="Name" required> <br>

    <input id="NW-email" name="NW-email" type="email" placeholder="Email" required> <br>

    <input id="NW-phone" name="NW-phone" type="tel" placeholder="Phone (Optional)"> <br>

    <input type="submit" value="Subscribe">
</form>
    @if(isset($_SESSION['subscribed']))
        <p class="AlertFeedback">Alert : &nbsp;
            @if($_SESSION['subscribed'] === false)
                <span class="NotSub">You are not a member, please subscribe</span>
            @else
                <span class="AlreadySub">Thank you for your feedback :D</span>
            @endif
        </p>
        @unset($_SESSION['subscribed'])
    @endif
    <h2>Already a member?</h2>
<form class="AM" method="post" action="/check_member">
    <input id="Member-ID" name="Member-ID" type="text" placeholder="Member-ID" required> <br>

    <label for="Member-Feedback">Feedback:</label>
    <textarea id="Member-Feedback" name="Member-Feedback"
              placeholder="Help us improve our service.." required>
    </textarea> <br>
    <input type="submit" value="Submit">
</form>

@endsection