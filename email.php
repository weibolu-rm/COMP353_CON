<?php //40058095
    include_once "templates/email_header.php";
?>
    <div class="pt-3 pb-2 mb-3">
        <h1 class="h2">Internal Emails </h1>
    </div>
    <?php
        if (isset($_GET["error"])) {        
            $message_type = "danger";
            if ($_GET["error"] == "none" || strpos($_GET["error"], "success") !== false)
                $message_type = "success";

            echo "<div class=\"sm-margin-top alert alert-{$message_type}\" role=\"alert\">";
            switch ($_GET["error"]) {
                case "none":
                    echo "Successfuly deleted email.";
                break;
                case "forbidden":
                    echo "Forbidden access.";
                break;

            }
            echo "</div>";
        }
    ?>

    <div class="table-responsive sm-margin-top">
        <button type="button" class="btn btn-primary" onclick="send_email()">Send Email</button>

        <script>
        function send_email() {
            document.location.href="send_email.php";
        }
        </script>

    <table class="sm-margin-top table table-striped table-sm">

        <?php
            require_once "includes/db_handler_inc.php";
            require_once "includes/email_functions_inc.php";
            $uid = $_SESSION["user_id"];
            print_emails($conn, $uid);

        ?>          
    </table>
      
<?php 
    include_once "templates/email_footer.php";
?>
