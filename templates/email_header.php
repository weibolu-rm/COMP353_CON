<?php
    include_once "header.php";    
    
    if(!isset($_SESSION["user_id"])){
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