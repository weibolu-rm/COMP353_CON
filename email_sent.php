
<?php 
    include_once "templates/email_header.php";
?>
    <div class="pt-3 pb-2 mb-3">
        <h1 class="h2">Internal Emails </h1>
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
            print_emails_sent($conn, $uid);

        ?>          
    </table>
      
<?php 
    include_once "templates/email_footer.php";
?>
