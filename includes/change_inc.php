<?php
    session_start();
    require_once "config_inc.php";

// prevents non admins to delete users by manually entering some url
if(!isset($_SESSION["user_id"]) || $_SESSION["privilege"] != "admin"){
    header("location: ../{$login_url}?error=restricted");
    exit();
}

if (isset($_GET["uid"])) {

    $uid = $_GET["uid"];

    require_once "db_handler_inc.php";
    require_once "functions_inc.php";

    // name change
    if(isset($_POST["change_user_name"])) {
        $name = $_POST["name"];

        if(invalid_name($name)) {
            header("location: ../{$admin_change_url}?uid={$uid}&error=invalidname");
            exit();
        }
        if(admin_change_user_name($conn, $uid, $name)) {
            if($_SESSION["user_id"] == $uid)
                $_SESSION["name"] = $name; // updating session variable if the connected admin changes themselves
            header("location: ../{$admin_change_url}?uid={$uid}&error=namesuccess");
            exit();
        }
        else {
            header("location: ../{$admin_change_url}?uid={$uid}&error=stmterror");
            exit();
        }
    }
    
    // email change
    if(isset($_POST["change_user_email"])) {
        $email = $_POST["email"];

        if(invalid_email($email)) {
            header("location: ../{$admin_change_url}?uid={$uid}&error=invalidemail");
            exit();
        }    
        if(email_already_taken($conn, $email)) {
            header("location: ../{$admin_change_url}?uid={$uid}&error=emailalreadytaken");
            exit();
        }

        if(admin_change_user_email($conn, $uid, $email)) {
            if($_SESSION["user_id"] == $uid)
                $_SESSION["email"] = $email; // updating session variable if the connected admin changes themselves
            header("location: ../{$admin_change_url}?uid={$uid}&error=emailsuccess");
            exit();
        } 
        else {        
            header("location: ../{$admin_change_url}?uid={$uid}&error=stmterror");
            exit();
        }
    }
    if(isset($_POST["change_user_password"])) {
        $new_password = $_POST["password_1"];
        $new_password_confirm = $_POST["password_2"];

        if (invalid_password($new_password, $new_password_confirm)) {
            header("location: ../{$admin_change_url}?uid={$uid}&error=passworddontmatch");
            exit();
        }
        if (invalid_password_length($new_password)) {
            header("location: ../{$admin_change_url}?uid={$uid}&error=invalidpasswordlength");
            exit();
        }

        if(admin_change_user_password($conn, $uid, $new_password)) {
            header("location: ../{$admin_change_url}?uid={$uid}&error=passwordsuccess");
            exit();
        }
        else {
            header("location: ../{$admin_change_url}?uid={$uid}&error=stmterror");
            exit();
        }
    }

    if(isset($_POST["change_user_privilege"])) {
        $privilege = $_POST["privilege"];        
        
        if(admin_change_user_privilege($conn, $uid, $privilege)) {

            // We're only preventing the default ademin from being revoked admin privilege.
            // If an admin wants to remove itself the admin privilege, we'll let him/her but he/she'll be redirected outside the admin panel.
            if($_SESSION["user_id"] == $uid) {
                switch($privilege) {
                    case "Standard user":
                        $privilege = 9;
                    break;
                    case "Administrator":
                        $privilege = 1;
                    break;
                }

                $_SESSION["privilege"] = $privilege;
            }
            header("location: ../{$admin_change_url}?uid={$uid}&error=privilegesuccess");
            exit();
        }
        else {
            header("location: ../{$admin_change_url}?uid={$uid}&error=stmterror");
            exit();
        }

    }

    header("location: ../{$admin_url}");
}
// will send users back to login page if they accessed this include illegally
else {
    header("location: ../{$login_url}");
    exit();
}