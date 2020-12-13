<?php // 40058095

function print_posts($conn,$uid) {
    require_once "functions_inc.php";
    require_once "group_functions_inc.php";
    
    $sql = "SELECT * FROM posts ORDER BY is_announcement DESC, post_id DESC;";
    $query_result = mysqli_query($conn, $sql);

    echo '<div class="row mb-2 margin-top">';
    if($query_result) {
        while($row = mysqli_fetch_assoc($query_result)) {  
            
            if("admin" == admin_by_id($conn, $uid)){
                $gid = fetch_group_id_by_admin($conn, $uid);
            }
            else{
                $gid = fetch_group_id_by_user($conn, $uid);
            }

            if("admin" == admin_by_id($conn, $row["user_id"])){
            $post_gid = fetch_group_id_by_admin($conn, $row["user_id"]);
            }
            else{
            $post_gid = fetch_group_id_by_user($conn, $row["user_id"]);
            }


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
            
            if("admin" != $_SESSION["privilege"]){
                 if($row["view_permission"] == "group" && $gid != $post_gid)
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


function print_posts_no_id($conn) {
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

function print_comments($conn, $pid) {
    $sql = "SELECT * FROM posts_comments WHERE post_id = {$pid};";
    $query_result = mysqli_query($conn, $sql);


    echo '<h6 class="text-white border-bottom border-gray pb-2 mb-0">Comments</h6>';

    if($query_result) {
        while($row = mysqli_fetch_assoc($query_result)) {
            $content = $row["content"];
            $visibility = $row["view_permission"];
            $user = fetch_user_by_id($conn, $row["user_id"]);   
            $post = fetch_post_by_id($conn, $pid);    
            if(isset($_SESSION["user_id"]))
                $viewer = $_SESSION["user_id"];


            if(!isset($_SESSION["user_id"]) && $row["view_permission"] != "public")
                continue;
            if ($row["view_permission"] == "original poster" && $viewer != $row["user_id"] 
                && $viewer != $post["user_id"] && $_SESSION["permission"] != "admin")
                continue;
            
            echo '<div class="media text-muted pt-3">
            <a href=profile.php?uid='. $row["user_id"] .'><svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg></a>
            <p class="text-white media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <a href=profile.php?uid='. $row["user_id"] .'><strong class="d-block text-primary">'. $user["name"] .'</strong></a>
                '. $content .'
            </br><small class="text-muted">'. $row["comment_date"] .'</small>
            </p></a>
            </div>';
        }
    }
        

    if($query_result !== false)
        mysqli_free_result($query_result);
    mysqli_close($conn);
}

function post_comment($conn, $uid, $pid, $content, $visibility) {
    
    $sql = "INSERT INTO posts_comments (user_id, post_id, content, comment_date, view_permission)
            VALUES (?, ?, ?, ?, ?);";


    $stmt = mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }

    $current_datetime = date('Y-m-d H:i:s');

    mysqli_stmt_bind_param($stmt, "iisss", $uid, $pid, $content, $current_datetime, $visibility);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
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
    // mysqli_close($conn); can't close $conn since will be used for comments
}

function print_comments_table($conn) {
    $sql = "SELECT * FROM posts_comments ORDER BY post_id ASC;";
    

    $query_result = mysqli_query($conn, $sql);
    echo "<thead>
            <tr>
              <th>pid</th>
              <th>uid</th>
              <th>Date</th>
              <th>Content</th>
              <th>Visibility</th>
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
            echo "<td>{$row["comment_date"]}</td>";
            echo "<td>{$content}</td>";
            echo "<td>{$row["view_permission"]}</td>";
            echo "<td>
                <div class=\"btn-group mr-2\">
                <a href=\"post.php?pid={$row["post_id"]}\"><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">View</button>
                <a href=\"includes/delete_inc.php?pid={$row["post_id"]}&comment=yes&date={$row["comment_date"]}\"><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Remove</button>
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
            <div class="jumbotron jumbotron-fluid">
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

function delete_comment($conn, $pid, $date) {


    $sql = "DELETE FROM posts_comments WHERE post_id = ? AND comment_date = ?;";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "is", $pid, $date);
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

    return $result;
}


function print_post_button($conn,$uid){
    $sql = "SELECT * FROM condo_owners WHERE user_id = ?;";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmterror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $uid);
    mysqli_stmt_execute($stmt);

    $query_result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($query_result)) {
        mysqli_stmt_close($stmt);
        echo "  <a href=\"user_post.php\"><button type=\"button\" class=\"btn btn-lg btn-outline-primary\">Create Post</button></a> &nbsp;";
        return $row["user_id"];
    }
    else {
        mysqli_stmt_close($stmt);
        return false;
    }
}

function print_posts_table_id($conn,$uid) {
    $sql = "SELECT * FROM posts WHERE user_id =?;";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmterror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $uid);
    mysqli_stmt_execute($stmt);

        
    $query_result = mysqli_stmt_get_result($stmt);
    if($query_result) {
    echo "<thead>
            <tr>
              <th>Title</th>
              <th>Content</th>
              <th>Date</th>
              <th>Visibility</th>
              <th>Manage</th>
            </tr>
            </thead>
            <tbody>";
        while($row = mysqli_fetch_assoc($query_result)) {
            echo "<tr>";
            echo "<td>{$row["title"]}</td>";
            echo "<td>{$row["content"]}</td>";
            echo "<td>{$row["post_date"]}</td>";
            echo "<td>{$row["view_permission"]}</td>";
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
}