<?php

function increment_besucher(){
    $link = connectdb();

    $sql = 'UPDATE besucher SET zahl = zahl + 1 WHERE id = 1';
    mysqli_query($link, $sql);

    mysqli_close($link);
}
function get_current_number(){
    $counter = [
        'besucher' => 0,
        'speisen' => 0,
        'newsletter_Abo' => 0
    ];

    $link = connectdb();

    $sql_1 = 'SELECT zahl FROM besucher';
    $ask = mysqli_query($link, $sql_1);
    $counter['besucher'] = $ask->fetch_array()['zahl'] ?? 0;

    $sql_2 = 'SELECT COUNT(id) as total FROM gericht';
    $ask = mysqli_query($link, $sql_2);
    $counter['speisen'] = $ask->fetch_array()['total'] ?? 0;

    $sql_3 = 'SELECT COUNT(id) as total FROM newsletter';
    $ask = mysqli_query($link, $sql_3);
    $counter['newsletter_Abo'] = $ask->fetch_array()['total'] ?? 0;

    return $counter;

}
























