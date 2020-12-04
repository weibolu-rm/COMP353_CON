<?php //40058095

// sending an email will create a record (copy) so the user that sent that email can have a copy/ delete that copy without deleting the only reference to it
function send_email($conn, $from_id, $to_id, $subject, $content) {
    $sql = "INSERT INTO emails (from_id, to_id, `subject`, content, email_date) VALUES (?, ?, ?, ?, ?);";
    $sql_record = "INSERT INTO emails_record (from_id, to_id, `subject`, content, email_date) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection
    $stmt_record = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql) || !mysqli_stmt_prepare($stmt_record, $sql_record)) {
        return false;
    }

    $current_date_time = date('Y-m-d H:i:s');

    mysqli_stmt_bind_param($stmt, "iisss", $from_id, $to_id, $subject, $content, $current_date_time);
    mysqli_stmt_bind_param($stmt_record, "iisss", $from_id, $to_id, $subject, $content, $current_date_time);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_execute($stmt_record);
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmt_record);
    return true;
}

// prints a table of emails (inbox)
function print_emails($conn, $to_id) {
    require_once "functions_inc.php";
    $sql = "SELECT * FROM emails WHERE to_id = {$to_id};";


    $query_result = mysqli_query($conn, $sql);
    echo "<thead>
            <tr>
              <th>From</th>
              <th>Subject</th>
              <th>Content</th>
              <th>Date</th>
              <th>Manage</th>
            </tr>
            </thead>
            <tbody>";
    if($query_result) {
        while($row = mysqli_fetch_assoc($query_result)) {
            $content = $row["content"];
            $from = fetch_user_by_id($conn, $row["from_id"]);

            if(strlen($content) > 100)
                $content = substr($content, 0, 100)."...";

            echo "<tr>";
            echo "<td>{$from["email"]}</td>";
            echo "<td>{$row["subject"]}</td>";
            echo "<td>{$content}</td>";
            echo "<td>{$row["email_date"]}</td>";
            echo "<td>
                <div class=\"btn-group mr-2\">
                <a href=\"email_view.php?fid={$row["from_id"]}&tid={$row["to_id"]}&inbox=yes&date={$row["email_date"]}\"><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">View</button>
                <a href=\"includes/delete_inc.php?fid={$row["from_id"]}&tid={$row["to_id"]}&inbox=yes&date={$row["email_date"]}\"><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Remove</button>
                </div>
                </td>";
        }
    }
    echo "</tbody>";
        

    if($query_result !== false)
        mysqli_free_result($query_result);
    mysqli_close($conn);
}

// prints a table of sent emails (outbox)
function print_emails_sent($conn, $from_id) {
    require_once "functions_inc.php";
    $sql = "SELECT * FROM emails_record WHERE from_id = {$from_id};";


    $query_result = mysqli_query($conn, $sql);
    echo "<thead>
            <tr>
              <th>To</th>
              <th>Subject</th>
              <th>Content</th>
              <th>Date</th>
              <th>Manage</th>
            </tr>
            </thead>
            <tbody>";
    if($query_result) {
        while($row = mysqli_fetch_assoc($query_result)) {
            $content = $row["content"];
            $to = fetch_user_by_id($conn, $row["to_id"]);

            if(strlen($content) > 100)
                $content = substr($content, 0, 100)."...";

            echo "<tr>";
            echo "<td>{$to["email"]}</td>";
            echo "<td>{$row["subject"]}</td>";
            echo "<td>{$content}</td>";
            echo "<td>{$row["email_date"]}</td>";
            echo "<td>
                <div class=\"btn-group mr-2\">
                <a href=\"email_view.php?fid={$row["from_id"]}&tid={$row["to_id"]}&inbox=no&date={$row["email_date"]}\"><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">View</button>
                <a href=\"includes/delete_inc.php?fid={$row["from_id"]}&tid={$row["to_id"]}&inbox=no&date={$row["email_date"]}\"><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Remove</button>
                </div>
                </td>";
        }
    }
    echo "</tbody>";
        

    if($query_result !== false)
        mysqli_free_result($query_result);
    mysqli_close($conn);
}

function fetch_email($conn, $from_id, $to_id, $date, $record = false) {
    $table = "emails";
    if($record)
        $table = "emails_record";

    $sql = "SELECT * FROM {$table} WHERE from_id = ? AND to_id = ? AND email_date = ?;";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "iis", $from_id, $to_id, $date);
    mysqli_stmt_execute($stmt);

    $query_result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($query_result)) {
        mysqli_stmt_close($stmt);
        return $row;
    }
    else {
        mysqli_stmt_close($stmt);
        return false;
    }
}

function delete_email($conn, $from_id, $to_id, $date, $record = false) {
    $table = "emails";
    if($record)
        $table = "emails_record";

    $sql = "DELETE FROM {$table} WHERE from_id = ? AND to_id = ? AND email_date = ?;";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "iis", $from_id, $to_id, $date);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
   
}