<?php //40058095
    include_once "templates/email_header.php";
?>
    <div class="border-bottom pt-3 pb-2 mb-3">
        <h1 class="h2">Internal Emails </h1>
    </div>
    <?php 
        require_once "includes/db_handler_inc.php";
        require_once "includes/email_functions_inc.php";
        require_once "includes/functions_inc.php";

        if(!isset($_GET["inbox"]) || !isset($_GET["tid"]) || !isset($_GET["fid"]) || !isset($_GET["date"])) {
            header("Location: {$email_url}?error=forbidden");
            exit();
        }

        $inbox = $_GET["inbox"];
        $from_id = $_GET["fid"];
        $to_id = $_GET["tid"];
        $date = $_GET["date"];

        if($inbox == "yes")
            $email = fetch_email($conn, $from_id, $to_id,  $date);
        else
            $email = fetch_email($conn, $from_id, $to_id, $date, true);

        $from = fetch_user_by_id($conn, $from_id);
        $to = fetch_user_by_id($conn, $to_id);

        if($email !== false) {
            echo "<p>Date " . $email["email_date"]."</p>";
            echo "<p>From: ";
            if($from !== false)
                echo $from["email"] . " ({$from["name"]})</p>";
            else 
                echo "</p>";

            echo "<p>To: ";
            if($to !== false)
                echo $to["email"] . " ({$to["name"]})</p>";
            else
                echo "</p>";

            echo "<p>{$email["content"]}</p>";
            
        }


    ?>
      
<?php 
    include_once "templates/email_footer.php";
?>

