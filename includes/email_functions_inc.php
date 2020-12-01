<?php //40058095o

function send_email($from_id, $to_id, $subject, $title, $content) {
    $sql = "INSERT INTO emails (from_id, to_id, subject, content, email_date) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }    

    $current_date_time = date('Y-m-d H:i:s');

    mysqli_stmt_bind_param($stmt, "iisss", $from_id, $to_id, $title, $content, $current_date_time);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}

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
                <a href=\"email.php?fid={$row["from_id"]}&tid={$row["to_id"]}\"><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">View</button>
                <a href=\"includes/delete_inc.php?fid={$row["from_id"]}&tid={$row["to_id"]}\"><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Remove</button>
                </div>
                </td>";
        }
    }
    echo "</tbody>";
        

    mysqli_free_result($query_result);
    mysqli_close($conn);
}

function fetch_post_by_id($conn, $pid) {
    $sql = "SELECT * FROM posts WHERE post_id = ?;";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "i", $pid);
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