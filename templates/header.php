<?php // 40058095
    session_start();
    require_once "includes/config_inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Condo-association Online Network System</title>
</head>
<body>



    <!-- navbar -->
    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
        <a id="logo" class="navbar-brand" href="<?php echo $home_url ?>">
    <img src="uploads/logo.png" alt="Home" style="width:150px;height:30px;">
    </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                <?php
                    if (isset($_SESSION["user_id"])) {
                        echo "<a class=\"nav-link ";
                            if(strpos($active_page, "email") !== false) // if name page contains "email"
                                echo "active";
                        echo "\" href=\"{$email_url}\">Email</a>";
                        if ($_SESSION["privilege"] == "admin") {
                            echo "<li class=\"nav-item\"><a class=\"nav-link ";
                            if(strpos($active_page, "admin") !== false) // if name page contains "admin"
                                echo "active";
                            echo "\" href=\"{$admin_url}\">Admin</a></li>";
                        }
                        echo "<li class=\"nav-item\"><a class=\"nav-link ";
                            if($active_page == "{$settings_url}") // if name page contains "admin"
                                echo "active";
                            echo "\" href=\"{$settings_url}\">Settings</a></li>";

                        echo "<a class=\"nav-link ";
                            if($active_page == "profile.php")
                                echo "active";
                        echo "\" href=\"{$profile_url}?uid={$_SESSION["user_id"]}\" >Profile</a>";
                    }
                    else {
                        echo "<a class=\"nav-link ";
                            if($active_page == "{$login_url}")
                                echo "active";
                        echo "\" href=\"{$login_url}\">Login</a>";
                    }
                ?>
                </li>
                <li class="nav-item">                
                <?php
                    if (isset($_SESSION["user_id"]))
                        echo "<a class=\"nav-link\" href=\"{$logout_url}\">Log out</a>";
                    // else
                    //     echo "<a class=\"nav-link\" href=\"{$register_url}\">Register</a>";
                ?>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid margin-top">