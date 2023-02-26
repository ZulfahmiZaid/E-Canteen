<?php

function getBewertungData(){
    $link = connectdb();

    $sql = "SELECT * FROM ownreviews WHERE benutzerID='".$_SESSION["benutzerID"]."';";
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);
    return $data;
}
function save_bewertung(){
    $benutzerID = $_SESSION["benutzerID"];
    $description = $_POST["kommentare"];
    $stern = $_POST["sterne"];
    $date = date("Y-m-d H:i:s");
    $gerichtID = $_SESSION["auswahl"];

    $link = connectdb();
    $sql_id = "INSERT INTO bewertung (benutzer_id, gericht_id, description, stern, datum) 
VALUES ('$benutzerID','$gerichtID','$description','$stern','$date')";
    mysqli_query($link, $sql_id);

}
function highlightbewertung(){
    $link = connectdb();

    $sql = "UPDATE bewertung 
            SET hervorgehoben = true
            WHERE bewertung_id = " . $_GET['bewertungID'] . ";";
    mysqli_query($link, $sql);
    mysqli_close($link);
}
function unhighlightBewertung(){
    $link = connectdb();

    $sql = "UPDATE bewertung 
            SET hervorgehoben = 0
            WHERE bewertung_id = " . $_GET['bewertungID'] . ";";
    mysqli_query($link, $sql);
    mysqli_close($link);
}
function deleteSelectedBewertungen(){
    $link = connectdb();

    $sql = "DELETE FROM bewertung WHERE bewertung_id = ".$_GET['bewertungID'].";";
    mysqli_query($link, $sql);

    mysqli_close($link);
}

function getallhighlighted(){
    $link = connectdb();

    $sql = "SELECT * FROM showreviews";
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);
    return $data;
}


