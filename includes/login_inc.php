<?php //40058095
    require_once "config_inc.php";

if (isset($_POST["login_user"])) {

    $email = $_POST["email"];
    $password = $_POST["password_1"];

    require_once "db_handler_inc.php";
    require_once "functions_inc.php";

    login_user($conn, $email, $password);
}
// will send users back to login page if they accessed this include illegally
else {
    header("location: ../{$login_url}");
    exit();
}