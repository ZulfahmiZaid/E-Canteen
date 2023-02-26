<?php

function already_a_member(){

    $link = connectdb();

    $sql = "SELECT id, email FROM newsletter;";
    $result = mysqli_query($link,$sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    foreach ($data as $value){
        if($value['email'] === $_POST["NW-email"]){
            $_SESSION['member_ID'] = $value['id'];
            return true;
        }
    }

    return false;
}
function save_subscriber(){

    $name = $_POST['NW-name'];
    $email = $_POST['NW-email'];
    $phone = $_POST['NW-phone'];

    $link = connectdb();

    $statement = $link->prepare("INSERT INTO newsletter (name,email,phone)VALUES (?,?,?)");

    $statement->bind_param("sss",$name,$email,$phone);
    $statement->execute();

    mysqli_close($link);
}