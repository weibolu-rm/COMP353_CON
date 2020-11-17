<?php

if (isset($_POST["register_user"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password_1"];
    $password_confirm = $_POST["password_2"];

    require_once "functions_inc.php";
    require_once "db_handler_inc.php";

    if (invalid_email($email)) {
        header("location: ../registration.php?error=invalidemail");
        exit();
    }
    if (invalid_name($name)) {
        header("location: ../registration.php?error=invalidname");
        exit();
    }
    if (email_already_taken($conn, $email)) {
        header("location: ../registration.php?error=emailalreadytaken");
        exit();
    }
    if (invalid_password($password, $password_confirm)) {
        header("location: ../registration.php?error=passworddontmatch");
        exit();
    }
    if (invalid_password_length($password)) {
        header("location: ../registration.php?error=invalidpasswordlength");
        exit();
    }
    create_user($conn, $name, $email, $password);

}

// will send users back to registration page if they accessed this include illegally
else {
    header("location: ../registration.php");
    exit();
}