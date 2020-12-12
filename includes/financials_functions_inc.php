<?php  //40025805


function get_occupied_condos_count($conn, $bid) {
    $sql = "SELECT COUNT(owner_id) AS building_owned FROM condo WHERE building_id = {$bid}";
    $query_result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($query_result);
    $result = $row["building_owned"];

    if($query_result !== false)
        mysqli_free_result($query_result);

    return $result;
}

function get_total_monthly_fees($conn, $bid) {
    $sql = "SELECT SUM(default_monthly_payment) AS building_default_yearly_sum FROM transaction_record, condo 
		    WHERE (transaction_record.user_id = condo.owner_id AND condo.building_id = {$bid})";
    $query_result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($query_result);
    $result = $row["building_default_yearly_sum"];

    if($query_result !== false)
        mysqli_free_result($query_result);

    return $result;
}

function get_total_maintenance_costs($conn, $bid) {
$sql = "SELECT SUM(total_cost) AS building_maintenance FROM maintenance WHERE building_id = {$bid}";
    $query_result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($query_result);
    $result = $row["building_maintenance"];

    if($query_result !== false)
        mysqli_free_result($query_result);

    return $result;
}

function print_building_financial_overview($conn) {
    $sql = "SELECT * FROM building ORDER BY building_id ASC;";
    $query_result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($query_result)) {
        $bid = $row["building_id"];
        $address = $row["address"];
        $postal_code = $row["postal_code"];
        $square_footage = $row["square_footage"];
        $occupied_count = get_occupied_condos_count($conn, $bid);
        $monthly_fees_paid = get_total_monthly_fees($conn, $bid);
        $maintenance_fees_paid = get_total_maintenance_costs($conn, $bid);

        echo "
        <h3 class='sm-margin-top'> Building Summary: </h3>
        <p><b> ID:</b> {$bid}</p>
        <p><b> Address: </b> {$address}</p>
        <p><b> Postal Code: </b> {$postal_code}</p>
        <p><b> Square footage:</b> {$square_footage}</p>
        <p><b> Number of Condos Occupied:</b> {$occupied_count}</p>
        <p><b> Total monthly fees paid:</b> {$monthly_fees_paid}</p>
        <p><b> Total maintenance costs paid:</b> {$maintenance_fees_paid}</p>
        ";	
        echo "<div class=\"btn-group mr-2\">
                <a href=\"financial_report.php?bid={$bid}\"><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Full Yearly Report</button></a>
                </div>";
    }

    if($query_result !== false)
        mysqli_free_result($query_result);
    mysqli_close($conn);
}

function print_full_transactions_by_building($conn, $bid) {
    $sql = "SELECT * FROM transaction_record INNER JOIN condo
            ON transaction_record.user_id = condo.owner_id
	        WHERE condo.building_id = {$bid} ORDER BY user_id ASC;";
    // here we don't need to bind a prepared statement as you couldn't do 
    $query_result = mysqli_query($conn, $sql);
    echo "<h3>Full Transction Report - Building ID {$bid} </h3>";
    echo "<thead>
            <tr>
              <th>User ID</th>
              <th>Payment Date</th>
              <th>Default Monthly Payment</th>
              <th>Maintenance  Payment</th>
            </tr>
            </thead>
            <tbody>";
    if($query_result) {
        while($row = mysqli_fetch_assoc($query_result)) {
            echo "<tr>";
            echo "<td>{$row["user_id"]}</td>";
            echo "<td>{$row["payment_date"]}</td>";
            echo "<td>{$row["default_monthly_payment"]}</td>";
            echo "<td>{$row["maintenance_payment"]}</td>";
            echo "</tr>";
        }
    }
    echo "</tbody>";


    if($query_result !== false)
        mysqli_free_result($query_result);
    mysqli_close($conn);
}

function print_full_transactions_by_uid($conn, $uid) {
    $sql = "SELECT * FROM transaction_record WHERE user_id = {$uid} ORDER BY user_id ASC;";
    // here we don't need to bind a prepared statement as you couldn't do 
    $query_result = mysqli_query($conn, $sql);
    echo "<h3>Full Transction Report</h3>";
    echo "<thead>
            <tr>
              <th>User ID</th>
              <th>Payment Date</th>
              <th>Default Monthly Payment</th>
              <th>Maintenance  Payment</th>
            </tr>
            </thead>
            <tbody>";
    if($query_result) {
        while($row = mysqli_fetch_assoc($query_result)) {
            echo "<tr>";
            echo "<td>{$row["user_id"]}</td>";
            echo "<td>{$row["payment_date"]}</td>";
            echo "<td>{$row["default_monthly_payment"]}</td>";
            echo "<td>{$row["maintenance_payment"]}</td>";
            echo "</tr>";
        }
    }
    echo "</tbody>";


    if($query_result)
        mysqli_free_result($query_result);
    mysqli_close($conn);
}