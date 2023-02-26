<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>E-Mensa</title>
    <link rel="stylesheet" href="/css/hauptseite_styles.css">
    <script src="https://kit.fontawesome.com/4bafb4d0bb.js" crossorigin="anonymous"></script>

    <!-- Slick Custom CSS -->
    <link rel="stylesheet" type="text/css" href="/js/slick-1.8.1/slick-1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/js/slick-1.8.1/slick-1.8.1/slick/slick-theme.scss"/>

    <!-- jQuery Library -->
    <script src="/js/jquery-3.6.2.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- initialize Slick Slider -->
    <script>
        $(document).ready(function (){
            $('.slideContainer').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: false,
                infinite: true,
                arrows: true,
                autoplay: true,
                autoplaySpeed: 2000,
                nextArrow: '.ArrowRight',
                prevArrow: '.ArrowLeft'
            });
        });
    </script>
</head>
<body>
<header>
    <div class="Logo">
        <h2>E-Mensa</h2>
    </div>
    <nav>
        @yield("Navigation")
    </nav>
</header>
<main>
    <section class="Gerichte">
        <div class="ArrowLeft">
            <i class="fa-solid fa-angle-left"></i>
        </div>
        <div class="slideContainer">
          @yield("foodDetails")
        </div>
        <div class="ArrowRight">
            <i class="fa-solid fa-angle-right"></i>
        </div>
        <!-- Slick Slider js -->
        <script type="text/javascript" src="/js/slick-1.8.1/slick-1.8.1/slick/slick.min.js"></script>
    </section>
    <section class="About">
        <div id ="IntroAndCounter" class="Intro">
            <h2>Willkommen!</h2>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet
                clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit
                amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed
                diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet
                nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed
                diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet
                clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
                vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
                no sea takimata sanctus est Lorem ipsum dolor sit amet.
            </p>
        </div>
        <div id="Zahlen" class="Zahlen">
            @yield("Counters")
        </div>
    </section>
    <div id="FormAndQuotes"></div>
    <section class="Newsletteranmeldung">
        <div class="Quote">
            <h1>"Some Cool Brand Slogan Here"</h1>
        </div>
        <div class="NW-Form">
            @yield("NewsletterForm")
        </div>
    </section>
</main>
<footer>
    <ul>
        <li>&copy; Emensa &nbsp;</li>
        <li>&nbsp; Vammy &nbsp;</li>
        <li>&nbsp; Kontakt &nbsp;</li>
        <li>&nbsp; Impressum</li>
    </ul>
</footer>
</body>
</html>

