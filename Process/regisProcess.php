<?php
    require_once('..\Class\member.php');
    $member = new member();

    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $pesan = "input_kosong";

    //DATA CHECKING
    if (isset($firstName) && isset($lastName) && isset($username) && isset($password)) {
        $pesan = $member->insertMember($firstName, $lastName, $username, $password);
    } 
    header("location:..\loginui.php?pesan=".$pesan);
?>
