<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>E-Mensa Rating</title>
    @yield("cssExtra")
</head>
<body>
<a class="Return" href="/hauptseite_Emensa"><i class="fa-solid fa-reply"></i></a>
<div class="NewRating">
    <div class="Food">
        @yield("FoodDesc")
    </div>
    <div class="Feedback">
        @yield("UserFeedback")
    </div>
</div>
<div class="OldRating">
    @yield("last30")
</div>
@yield("benutzer")
</body>
</html>