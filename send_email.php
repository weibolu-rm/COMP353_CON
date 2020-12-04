<?php // 40024592
    include_once "templates/email_header.php";

    if (isset($_GET["error"])) {        
        $message_type = "danger";
        if ($_GET["error"] == "none" || strpos($_GET["error"], "success") !== false)
            $message_type = "success";

        echo "<div class=\"sm-margin-top alert alert-{$message_type}\" role=\"alert\">";
        switch ($_GET["error"]) {
            case "none":
                echo "Successfuly sent email.";
            break;
            case "stmt":
                echo "Error sending your email. Please try again later.";
            break;
            case "usernotfound":
                echo "There exists no users with this email address.";
            break;
        }
        echo "</div>";
    }
?>
<div class="pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Send Email </h1>
</div>

<div class="row justify-content-start">
<div class="col-lg-6">
<form action="includes/email_inc.php" method="post">

    <div class="form-group">
    <label for="email">Recipient Email</label>
    
    <?php
        require_once "includes/db_handler_inc.php";
       // require_once "includes/group_functions_inc.php";
        require_once "includes/functions_inc.php";
        if(isset($_GET["uid"])){
        $row = fetch_user_by_id($conn, $_GET["uid"]);
        echo "<input type=" ."email". " name=" ."recipient". " class=" ."form-control". " value=".$row["email"]." required>";
        }
        else{
        echo "<input type=" ."email". " name=" ."recipient". " class=" ."form-control". " required>";
        }
    ?>
    </div>      
    <div class="form-group">
        <label for="subject">Subject</label>
        <input type="text" name="subject" class="form-control" required>
    </div>      
    <div class="form-group">
        <label for="">Content</label>
        <textarea name="content" class="form-control" rows="9" required></textarea>
    </div>
    <button type="submit" name="send_email" class="btn btn-light">Send</button>

</form>
</div>
</div>
<?php
    include_once "templates/email_footer.php";
?>