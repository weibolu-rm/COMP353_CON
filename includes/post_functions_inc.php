<?php // 40058095

function print_posts($conn) {
    require_once "functions_inc.php";
    
    $sql = "SELECT * FROM posts ORDER BY is_announcement DESC, post_id DESC;";
    $query_result = mysqli_query($conn, $sql);
    echo '<div class="row mb-2 margin-top">';
    if($query_result) {
        while($row = mysqli_fetch_assoc($query_result)) {
            $user = fetch_user_by_id($conn, $row["user_id"]);
            $message_type = "primary";
            if($row["is_announcement"] == 1)
                $message_type = "danger";
            
            // visibility
            if($_SESSION["privilege"] != "admin" && $row["view_permission"] == "admin")
                continue;
            if(!isset($_SESSION["user_id"]) && $row["view_permission"] == "user")
                continue;


            echo '
                <div class="col-md-6">
                    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-'. $message_type .'">'.$user["name"].'</strong>
                            <h3 class="mb-0">'. $row["title"] .'</h3>
                            <div class="mb-1 text-muted">'. $row["post_date"] .'</div>
                            <p class="card-text mb-auto">'. $row["content"] .'</p>
                            <a href="#?pid='. $row["post_id"] .'" class="stretched-link text-muted">Continue reading</a>
                        </div>
                        <!-- <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                        </div> -->
                    </div>
                </div>';
        }
    }

    echo '</div>';
    mysqli_free_result($query_result);
    mysqli_close($conn);
}

function print_posts_table($conn) {
    $sql = "SELECT * FROM posts ORDER BY post_id ASC;";

    $query_result = mysqli_query($conn, $sql);
    echo "<thead>
            <tr>
              <th>pid</th>
              <th>uid</th>
              <th>Date</th>
              <th>Title</th>
              <th>Content</th>
              <th>Visibility</th>
              <th>Has image</th>
              <th>Manage</th>
            </tr>
            </thead>
            <tbody>";
    if($query_result) {
        while($row = mysqli_fetch_assoc($query_result)) {
            echo "<tr>";
            echo "<td>{$row["post_id"]}</td>";
            echo "<td><a href=\"admin_change_user.php?uid={$row["user_id"]}\">{$row["user_id"]}</a></td>";
            echo "<td>{$row["post_date"]}</td>";
            echo "<td>{$row["title"]}</td>";
            echo "<td>{$row["content"]}</td>";
            echo "<td>{$row["view_permission"]}</td>";
            echo "<td>{$row["image_status"]}</td>";
            echo "<td>
                <div class=\"btn-group mr-2\">
                <a href=\"includes/post.php?pid={$row["post_id"]}\"><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">View</button>
                <a href=\"includes/delete_inc.php?pid={$row["post_id"]}\"><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Remove</button>
                </div>
                </td>";
        }
    }
    echo "</tbody>";
        

    mysqli_free_result($query_result);
    mysqli_close($conn);
}

function delete_post($conn, $pid) {
    $sql = "DELETE FROM posts WHERE post_id = ?;";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "i", $pid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}

function create_post($conn, $uid, $title, 
                     $content, $visibility, $img = false, $announcement = false) {

    if(!$announcement === false)
        $announcement = 1;
    else
        $announcement = 0;
    
    if(!$img === false)
        $img = 1;
    else
        $img = 0;
    
    $sql = "INSERT INTO posts (user_id, post_date, title, content, view_permission, image_status, is_announcement)
            VALUES (?, ?, ?, ?, ?, ?, ?);";


    $stmt = mysqli_stmt_init($conn); // prevents sql injection
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }

    $current_datetime = date('Y-m-d H:i:s');

    mysqli_stmt_bind_param($stmt, "issssii", $uid, $current_datetime, $title, $content, $visibility, $img, $announcement);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}