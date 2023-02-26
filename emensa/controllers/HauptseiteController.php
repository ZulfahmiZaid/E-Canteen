<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/gericht.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/verification.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/gerichtData.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/bewertung.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/counter.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/newsletter.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/feedback.php');

class HauptseiteController
{
    public function call_hauptseite(RequestData $rd)
    {
        increment_besucher();

        $all_gericht = db_gericht_select_all();
        $logger = logger();
        $reviews = getallhighlighted();
        $logger->info("Zugriff auf der Hauptseite");
        $counter = get_current_number();

        return view('hauptseite.display_hauptseite', [
            'counter' => $counter,
            'foods' => $all_gericht,
            'angemeldet' => $_SESSION['angemeldet'] ?? null,
            'reviews' => $reviews,
            'url' => 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"
        ]);

    }

    public function call_anmeldung(RequestData $rd){
        return view('anmeldung.anmeldung_page', [
            'request' => $rd,
            'fehler' => $_SESSION['fehlermeldung'] ?? null,
            'url' => 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"
        ]);
    }

    public function call_verify(RequestData $rd){
        $verify = check_anmeldeDaten();
        if($verify === "Erfolgreich angemeldet"){
            if($_SESSION["fromBewertung"] === true){
                $_SESSION["fromBewertung"] = false;
                header("Location:/bewertung?gerichtID="
                    .$_SESSION['food_ID']);
            }
            else {
                header("Location:/hauptseite_Emensa");
            }
        }
        else{
            $_SESSION['fehlermeldung'] = $verify;
            header("Location:/anmeldung");
        }
    }

    public function call_abmelden(RequestData $rd){
        $logger = logger();
        $logger->info($_SESSION['angemeldet']." hat sich abgemeldet");
        $_SESSION['angemeldet'] = null;
        $_SESSION['benutzerID'] = null;
        $_SESSION['fehlermeldung'] = null;
        header("Location:/hauptseite_Emensa");
    }

    public function call_bewertung(RequestData $rd){
        if($_SESSION['angemeldet'] === null){
            $_SESSION['fromBewertung'] = true;
            $_SESSION['food_ID'] = $_GET['gerichtID'];
            header("Location:/anmeldung");
        }else{

            $gerichtData = getGerichtData();
            $_SESSION["auswahl"] = $gerichtData[0]["id"];
            $last30 = collectLast30();
            return view('bewertung.bewertung_page_1', [
                'request' => $rd,
                'gerichtData' => $gerichtData,
                'last30' => $last30 ?? null,
                'url' => 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"
            ]);
        }
    }

    public function call_verifyBewertung(){
        save_bewertung();
        header("Location:/bewertung?gerichtID=".$_SESSION["auswahl"]);
    }

    public function call_highlight(){
        highlightbewertung();
        header("Location:/bewertung?gerichtID=".$_SESSION["auswahl"]);
    }

    public function call_unhighlight(){
        unhighlightbewertung();
        header("Location:/bewertung?gerichtID=".$_SESSION["auswahl"]);
    }

    public function alleBewertungen(RequestData $rd){

        $getallBewertung = getBewertungData();

        return view('bewertung.bewertung_page_2', [
            'request' => $rd,
            'bewertungen' => $getallBewertung ?? null,
            'url' => 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"
        ]);
    }

    public function deleteBewertungen(){
        deleteSelectedBewertungen();
        header("Location:/meinebewertungen");
    }

    public function call_subscribe(){

        if(isset($_POST["NW-email"])) {
            if (!already_a_member()) {
                save_subscriber();
                $_SESSION['member'] = false;
            } else
                $_SESSION['member'] = true;

            unset($_POST["NW-email"]);
        }
        header("Location:/hauptseite_Emensa");
    }

    public function call_check_membership(){


        if(isset($_POST["Member-ID"])) {
            if (membership_check()) {
                save_feedback();
                $_SESSION['subscribed'] = true;
            } else
                $_SESSION['subscribed'] = false;

            unset($_POST["Member-ID"]);
        }

        header("Location:/hauptseite_Emensa");
    }

    public function call_signup(RequestData  $rd){
        return view('signup.signup_data_page', [
            'request' => $rd,
            'url' => 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"
        ]);
    }
    public function call_verify_signup(){

       if(verify_signup())
            return view('signup.signup_success_page');
        else
            return view('signup.signup_data_page');
    }
}

