<?php
    include_once "header.php";    
    
    if(!isset($_SESSION["user_id"]) || $_SESSION["privilege"] != "admin"){
        header("location: {$login_url}?error=restricted");
        exit();
    }
?>

<div class="container-fluid">
<div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Manage Emails</span>
        </h6>
        <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link"  href="<?php echo $email_url; ?>">
            Inbox
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $email_url; ?>">
            Sent
            </a>
        </li>
        </ul>

    </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="pt-3 pb-2 mb-3">
        <h1 class="h2">Internal Emails</h1>
    </div>

    <?php
        if (isset($_GET["error"])) {
            switch($_GET["error"]) {
            case "none":
                echo "<div class=\"alert alert-success\" role=\"alert\">
                Successfully deleted email.
                </div>";
            break;
            }
        }
    ?>

    <div class="table-responsive sm-margin-top">
    <table class="table table-striped table-sm">

        <?php
            require_once "includes/db_handler_inc.php";
            require_once "includes/email_functions_inc.php";
            $uid = $_SESSION["user_id"];
            print_emails($conn, $uid);

        ?>          
    </table>
      
      







    </main>
</div>
</div>
    
<?php 
    include_once "footer.php";
?>