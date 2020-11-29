<?php // 40058095
    include_once "admin_header.php";
?>

<div class=container-fluid>
<h2>Register New User</h2>
<?php
    if (isset($_GET["error"])) {
        $message_type = "danger";
        if ($_GET["error"] == "none")
            $message_type = "success";

        echo "<div class=\"sm-margin-top alert alert-{$message_type}\" role=\"alert\">";

        switch ($_GET["error"]) {
            case "invalidemail":
                echo "Please use a valid email address.";
            break;
            case "invalidname":
                echo "Name is invalid. Please try again.";
            break;
            case "emailalreadytaken":
                echo 'Email is already in use.';
            break;
            case "passworddontmatch":
                echo "Passwords don't match. Please try again.";
            break;
            case "invalidpasswordlength":
                echo "Password has to be at least 8 characters.";
            break;
            case "none":
                echo "Successfuly registered new user.";
            break;
        }
        echo "</div>";
    }
?>
<div class="row justify-content-start">
<div class="col-lg-6">
<!-- _inc.php files are include files -->
<form action="includes/registration_inc.php" method="post">

    <div class="form-group">
        <label for="name">Full Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>      
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password_1" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password">Confirm Password</label>
        <input type="password" name="password_2" class="form-control" required>
    </div>    
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="privilege">User privilege</label>
        <select class="form-control" name="privilege" required>
            <option>Standard user</option>
            <option>Administrator</option>
        </select>
    </div>
    <button type="submit" name="register_user" class="btn btn-light">Register</button>

</form>


</div>
</div>
</div>

<?php
    include_once "admin_footer.php";
?>

