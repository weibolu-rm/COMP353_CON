<?php 
    $home_url = "index.php";
    $login_url = "login.php";
    $register_url = "admin_registration.php";
    $profile_url = "#";
    $logout_url = "includes/logout_inc.php";
    $admin_url = "admin.php";
    $admin_change_url = "admin_change_user.php";
    $settings_url = "settings.php";
    $active_page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
    $settings_inc_url = "includes/settings_inc.php";
    $change_inc_url = "includes/change_inc.php";