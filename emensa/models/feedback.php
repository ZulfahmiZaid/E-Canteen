<?php

function membership_check(){

    $link = connectdb();

    $sql = "SELECT id FROM newsletter;";
    $result = mysqli_query($link,$sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    foreach ($data as $value){
        if($value['id'] === $_POST["Member-ID"]){
            return true;
        }
    }

    return false;
}
function save_feedback(){

    $member_id = (int) $_POST['Member-ID'];
    $feedback =  $_POST['Member-Feedback'];

    $link = connectdb();

    $statement = $link->prepare("INSERT INTO members_feedback
                        (benutzer_id,feedback)VALUES (?,?)");

    $statement->bind_param("is", $member_id, $feedback);
    $statement->execute();

    mysqli_close($link);
}