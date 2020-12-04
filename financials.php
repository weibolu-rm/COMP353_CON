<!-- ID: 40025805 -->

<?php // 40058095
    include_once "templates/admin_header.php";
?>

<h2>Building Financial Overview</h2>
<?php
    if (isset($_GET["error"])) {
        switch($_GET["error"]) {
        case "none":
            echo "<div class=\"alert alert-success\" role=\"alert\">
            Successfully removed user.
            </div>";
        break;
        case "forbiden":
            echo "<div class=\"alert alert-danger\" role=\"alert\">
            This action is forbiden.
            </div>";
        break;

        }
    }
?>

<div class="table-responsive sm-margin-top"> 
<h3> Building 1 Summary: </h3>
<b> Percentage Occupied:</b>
<?php
        require_once "includes/db_handler_inc.php";
        require_once "includes/functions_inc.php";
		$sql = "SELECT SUM(percent_owned) AS building_1_owned FROM condo_owners WHERE user_id <= 10";
		$query_result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($query_result);
		  echo "<td>{$row["building_1_owned"]}</td>";
?>
<br>
<b> Total monthly fees paid this year:</b>
</select>
<?php
        require_once "includes/db_handler_inc.php";
        require_once "includes/functions_inc.php";
		$sql = "SELECT SUM(default_monthly_payment) AS building_1_default_yearly_sum FROM transaction_record WHERE user_id <= 10";
		$query_result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($query_result);
		  echo "<td>{$row["building_1_default_yearly_sum"]}</td>";
?>  
	<br>
	<b> Total maintenance costs paid this year:</b>
</select>
<?php
        require_once "includes/db_handler_inc.php";
        require_once "includes/functions_inc.php";
		$sql = "SELECT SUM(total_cost) AS building_1_maintenance FROM maintenance WHERE building_id = 1";
		$query_result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($query_result);
		  echo "<td>{$row["building_1_maintenance"]}</td>";
?>  
	
	  <div class=\"btn-group mr-2\">
                <a href=\"building_1_transactions.php?uid={$row["user_id"]}\"><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Full Yearly Report</button></a>
                </div>

	
</div>

<div class="table-responsive sm-margin-top"> 
<h3> Building 2 Summary: </h3>
<b> Percentage Occupied:</b>
<?php
        require_once "includes/db_handler_inc.php";
        require_once "includes/functions_inc.php";
		$sql = "SELECT SUM(percent_owned) AS building_2_owned FROM condo_owners WHERE (10 < user_id AND user_id <= 20)";
		$query_result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($query_result);
		  echo "<td>{$row["building_2_owned"]}</td>";
?>
<br>
<b> Total monthly fees paid this year:</b>
</select>
<?php
        require_once "includes/db_handler_inc.php";
        require_once "includes/functions_inc.php";
		$sql = "SELECT SUM(default_monthly_payment) AS building_2_default_yearly_sum FROM transaction_record WHERE (10 < user_id AND user_id <= 20)";
		$query_result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($query_result);
		  echo "<td>{$row["building_2_default_yearly_sum"]}</td>";
?>  
	<br>
	<b> Total maintenance costs paid this year:</b>
</select>
<?php
        require_once "includes/db_handler_inc.php";
        require_once "includes/functions_inc.php";
		$sql = "SELECT SUM(total_cost) AS building_2_maintenance FROM maintenance WHERE building_id = 2";
		$query_result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($query_result);
		  echo "<td>{$row["building_2_maintenance"]}</td>";
?>  
	
	  <div class=\"btn-group mr-2\">
                <a href=\"building_2_transactions.php?uid={$row["user_id"]}\"><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Full Yearly Report</button></a>
                </div>
</div>

<div class="table-responsive sm-margin-top"> 
<h3> Building 3 Summary: </h3>
<b> Percentage Occupied:</b>
<?php
        require_once "includes/db_handler_inc.php";
        require_once "includes/functions_inc.php";
		$sql = "SELECT SUM(percent_owned) AS building_3_owned FROM condo_owners WHERE (20 < user_id AND user_id <= 300)";
		$query_result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($query_result);
		  echo "<td>{$row["building_3_owned"]}</td>";
?>
<br>
<b> Total monthly fees paid this year:</b>
</select>
<?php
        require_once "includes/db_handler_inc.php";
        require_once "includes/functions_inc.php";
		$sql = "SELECT SUM(default_monthly_payment) AS building_3_default_yearly_sum FROM transaction_record WHERE (20 < user_id AND user_id <= 30)";
		$query_result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($query_result);
		  echo "<td>{$row["building_3_default_yearly_sum"]}</td>";
?>  
	<br>
	<b> Total maintenance costs paid this year:</b>
</select>
<?php
        require_once "includes/db_handler_inc.php";
        require_once "includes/functions_inc.php";
		$sql = "SELECT SUM(total_cost) AS building_3_maintenance FROM maintenance WHERE building_id = 3";
		$query_result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($query_result);
		  echo "<td>{$row["building_3_maintenance"]}</td>";
?>  
	
	  <div class=\"btn-group mr-2\">
                <a href=\"building_3_transactions.php?uid={$row["user_id"]}\"><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Full Yearly Report</button></a>
                </div>
</div>

<?php
    include_once "templates/admin_footer.php";
?>