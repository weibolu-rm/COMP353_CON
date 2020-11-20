<?php 
    $home_url = "index.php";
    $login_url = "login.php";
    $register_url = "admin_registration.php";
    $profile_url = "#";
    $logout_url = "includes/logout_inc.php";
    $admin_url = "admin.php";
    $settings_url = "settings.php";
    $active_page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  