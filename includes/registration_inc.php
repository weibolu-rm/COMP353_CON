<?php //40058095
    require_once "config_inc.php";

if (isset($_POST["register_user"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password_1"];
    $password_confirm = $_POST["password_2"];
    $address = $_POST["address"];
    $postal_code = $_POST["postal_code"];
    $privilege = $_POST["privilege"];


    require_once "functions_inc.php";
    require_once "db_handler_inc.php";

    if (invalid_email($email)) {
        header("location: ../{$register_url}?error=invalidemail");
        exit();
    }
    if (invalid_name($name)) {
        header("location: ../{$register_url}?error=invalidname");
        exit();
    }
    if (email_already_taken($conn, $email)) {
        header("location: ../{$register_url}?error=emailalreadytaken");
        exit();
    }
    if (invalid_password($password, $password_confirm)) {
        header("location: ../{$register_url}?error=passworddontmatch");
        exit();
    }
    if (invalid_password_length($password)) {
        header("location: ../{$register_url}?error=invalidpasswordlength");
        exit();
    }
    if (invalid_postal_code_length($postal_code)) {
        header("location: ../{$register_url}?error=postallength");
        exit();
    }
    if(create_user($conn, $name, $email, $password, $address, $postal_code, $privilege) === false) {
        header("location: ../{$admin_registration_url}?error=stmterror");
        exit();
    }
    else {
        header("location: ../{$admin_registration_url}?error=none");
        exit();
    }

}

// will send users back to login page if they accessed this include illegally
else {
    header("location: ../{$login_url}");
    exit();
}