<?php  // 40058095
    $home_url = "index.php";
    $login_url = "login.php";
    $register_url = "admin_registration.php";
    $profile_url = "profile.php";
    $logout_url = "includes/logout_inc.php";
    $admin_url = "admin.php";
    $admin_change_url = "admin_change_user.php";
    $admin_group_url = "admin_groups.php";
    $admin_group_change_url = "admin_change_group.php";
    $admin_group_add_url = "admin_add_group_member.php";
    $admin_posts_url = "admin_posts.php";
    $admin_registration_url = "admin_registration.php";
    $admin_announcement_url = "admin_announcement.php";
    $admin_groups_url = "admin_groups.php";
    $settings_url = "settings.php";
    $active_page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
    $settings_inc_url = "includes/settings_inc.php";
    $change_inc_url = "includes/change_inc.php";
    $post_url = "post.php";
    $email_url = "email.php";
    $email_view_url = "email_view.php";
    $email_sent_url = "email_sent.php";
    $send_email_url = "send_email.php";
    $financials_url = "financials.php";
    $user_post_url = "user_post.php";
    $admin_group_change_user_url = "admin_change_group_user.php";
    $group_chat_url = "group_chat.php";

    date_default_timezone_set("America/New_York");
    // TODO: REMOVE BEFORE DEPLOYMENT
    // mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    error_reporting(0); // for deployment, don't want to somehow leak something to the end user
