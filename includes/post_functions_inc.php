<?php // 40058095

function print_posts($conn) {
    require_once "functions_inc.php";
    
    $sql = "SELECT * FROM posts ORDER BY is_announcement DESC, post_id DESC;";
    $query_result = mysqli_query($conn, $sql);
    echo '<div class="row mb-2 margin-top">';
    if($query_result) {
        while($row = mysqli_fetch_assoc($query_result)) {            
            $content = $row["content"];
            if(strlen($content) > 100)
                $content = substr($content, 0, 100)."...";


            $user = fetch_user_by_id($conn, $row["user_id"]);
            $message_type = "primary";
            if($row["is_announcement"] == 1)
                $message_type = "danger";
            
            // visibility
            if(!isset($_SESSION["privilege"])) {
                if($row["view_permission"] != "public")
                    continue;
            } 
            else {
                if($row["view_permission"] == "admin" && $_SESSION["privilege"] != "admin")
                    continue;
            }


            echo '
                <div class="col-md-6">
                    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-'. $message_type .'">'.$user["name"].'</strong>
                            <h3 class="mb-0">'. $row["title"] .'</h3>
                            <div class="mb-1 text-muted">'. $row["post_date"] .'</div>
                            <p class="card-text mb-auto">'. $content .'</p>
                            <a href="post.php?pid='. $row["post_id"] .'" class="stretched-link text-muted">Continue reading</a>
                        </div>
                    </div>
                </div>';
        }
    }

    echo '</div>';
    if($query_result !== false)
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
              <th>Image File</th>
              <th>Manage</th>
            </tr>
            </thead>
            <tbody>";
    if($query_result) {
        while($row = mysqli_fetch_assoc($query_result)) {
            $content = $row["content"];

            if(strlen($content) > 100)
                $content = substr($content, 0, 100)."...";
            echo "<tr>";
            echo "<td>{$row["post_id"]}</td>";
            echo "<td><a href=\"admin_change_user.php?uid={$row["user_id"]}\">{$row["user_id"]}</a></td>";
            echo "<td>{$row["post_date"]}</td>";
            echo "<td>{$row["title"]}</td>";
            echo "<td>{$content}</td>";
            echo "<td>{$row["view_permission"]}</td>";
            echo "<td>{$row["image_id"]}</td>";
            echo "<td>
                <div class=\"btn-group mr-2\">
                <a href=\"post.php?pid={$row["post_id"]}\"><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">View</button>
                <a href=\"includes/delete_inc.php?pid={$row["post_id"]}\"><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Remove</button>
                </div>
                </td>";
        }
    }
    echo "</tbody>";
        

    if($query_result !== false)
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

function print_single_post($conn, $pid) {
    require_once "functions_inc.php";
    if($row = fetch_post_by_id($conn, $pid)) {
        $uid = $row["user_id"];
        $user = fetch_user_by_id($conn, $uid);


        echo '
            <div class="jumbotron jumbotron-fluid" style="background-color:black;">
            <div class="container">
                <h1 class="display-4">'. $row["title"] .'</h1>
                <p class="lead">Post by '. $user["name"].'</p>
                <div class="mb-1 text-muted">'. $row["post_date"] .'</div>
                <hr class="my-4">
                <p class="lead">'. $row["content"] .'</p>';
        if($row["image_id"] != "none")
            echo '<img src="uploads/'. $row["image_id"] .'" class="img-fluid" alt="Post image">';
        echo'
            </div>
            </div>';
    }
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
                     $content, $visibility, $img, $announcement = false) {

    if(!$announcement === false)
        $announcement = 1;
    else
        $announcement = 0;
    
    
    $sql = "INSERT INTO posts (user_id, post_date, title, content, view_permission, image_id, is_announcement)
            VALUES (?, ?, ?, ?, ?, ?, ?);";


    $stmt = mysqli_stmt_init($conn); // prevents sql injection
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }

    $current_datetime = date('Y-m-d H:i:s');

    mysqli_stmt_bind_param($stmt, "isssssi", $uid, $current_datetime, $title, $content, $visibility, $img, $announcement);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}

function next_post_id($conn) {
    $sql = "SELECT  AUTO_INCREMENT i FROM information_schema.TABLES WHERE (TABLE_NAME = posts);";

    $query_result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query_result);
    $result = $row["i"];
    if($query_result !== false)
        mysqli_free_result($query_result);
    mysqli_close($conn);

    return $result;
}
