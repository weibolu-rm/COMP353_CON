<?php
    include_once "header.php";
?>

<div class="col-md-12 text-center">
    <h1 class="display-4">Condo-association Online Network System</h1>
    <?php 
        if (isset($_SESSION["uname"]))
            echo "<h3 class=\"margin-top\">Welcome back, {$_SESSION["uname"]}.";
    ?>
</div>

<?php
    include_once "footer.php";
?>

