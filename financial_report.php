<?php // 40058095
    include_once "templates/admin_header.php";
?>

<?php //40025805
require_once "includes/functions_inc.php";
$building_id = $_GET["bid"]
print_full_transactions_by_building($conn, $bid)
?>


