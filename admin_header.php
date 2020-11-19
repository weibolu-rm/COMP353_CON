<?php
    include_once "header.php";
?>

<div class="container-fluid">
<div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link"  href="<?php echo $admin_url; ?>">
            Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $register_url; ?>">
            Manage Users
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
            Products
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
            Customers
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
            Reports
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
            Integrations
            </a>
        </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Saved reports</span>
        <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
        </a>
        </h6>
        <ul class="nav flex-column mb-2">
        <li class="nav-item">
            <a class="nav-link" href="#">
            Current month
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
            Last quarter
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
            Social engagement
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
            Year-end sale
            </a>
        </li>
        </ul>
    </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
        </div>

