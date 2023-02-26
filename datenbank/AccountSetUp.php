<?php

//Benötigte Informationen der Benutzer
$name = "";
$email = "";
$passwort = "";
$salt = "";

$database_connect = mysqli_connect("localhost", // Host der Datenbank
    "",                 // Benutzername zur Anmeldung
    "",    // Passwort
    "",     // Auswahl der Datenbanken (bzw. des Schemas)
    3306 // optional port der Datenbank
);

if (!$database_connect) {
    echo "Verbindung fehlgeschlagen: ", mysqli_connect_error();
    exit();
}

$statement = $database_connect->prepare(
    "INSERT INTO benutzer (name,email,passwort,letzteanmeldung) VALUES ( ?,?,?,?);");

$cryptedPass = sha1($salt.$passwort);
$date = date("d.m.y");

$statement->bind_param('ssss',$name,$email, $cryptedPass, $date);

$statement->execute();