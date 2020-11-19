<?php
    session_start();
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

    <?php 
        $home_url = "index.php";
        $login_url = "login.php";
        $register_url = "admin_registration.php";
        $profile_url = "#";
        $logout_url = "includes/logout_inc.php";
        $admin_url = "admin.php";
        $active_page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
    ?>

    <!-- navbar -->
    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
        <a class="navbar-brand" href="<?php echo $home_url ?>">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                <?php
                    if (isset($_SESSION["uid"])) {
                        if ($_SESSION["uprivilege"] == 1) {
                            echo "<li class=\"nav-item\"><a class=\"nav-link ";
                            if($active_page == "admin.php")
                                echo "active";
                            echo "\" href=\"{$admin_url}\">Admin</a></li>";
                        }
                        echo "<a class=\"nav-link ";
                            if($active_page == "profile.php")
                                echo "active";
                        echo "\" href=\"{$profile_url}\">Profile</a>";
                    }
                    else {
                        echo "<a class=\"nav-link ";
                            if($active_page == "login.php")
                                echo "active";
                        echo "\" href=\"{$login_url}\">Login</a>";
                    }
                ?>
                </li>
                <li class="nav-item">                
                <?php
                    if (isset($_SESSION["uid"]))
                        echo "<a class=\"nav-link\" href=\"{$logout_url}\">Log out</a>";
                    // else
                    //     echo "<a class=\"nav-link\" href=\"{$register_url}\">Register</a>";
                ?>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid margin-top">