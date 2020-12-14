<?php // 40058095
// 40024592



/*
function fetch_user_by_id($conn, $uid) {
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
        return $row;
    }
    else {
        mysqli_stmt_close($stmt);
        return false;
    }
}
*/

function create_group_post($conn, $uid, $gid, $content) {


    $sql = "INSERT INTO group_posts (user_id, group_id, post_date, content)
            VALUES (?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn); // prevents sql injection
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }

    $current_datetime = date('Y-m-d H:i:s');

    mysqli_stmt_bind_param($stmt, "ssss", $uid, $gid, $current_datetime, $content);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}


function admin_by_id($conn, $uid) {
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
        return $row["privilege"];
    }
    else {
        mysqli_stmt_close($stmt);
        return false;
    }
}

/*
function print_single_user_name($conn, $uid) {

    if($row = fetch_user_by_id($conn, $uid)) {
        echo "<h1>". $row["name"] . "</h1> ";
    }
}


function print_single_user_profile($conn, $uid) {

    if($row = fetch_user_by_id($conn, $uid)) {
        echo "<br>Email: ". $row["email"] . "<br>";
        echo "Address: ". $row["address"] . "<br>";
    }

}
*/

function fetch_name_by_id($conn, $uid) {
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
        return $row["name"];
    }
    else {
        mysqli_stmt_close($stmt);
        return false;
    }
}

function fetch_group_by_id($conn, $gid) {
    $sql = "SELECT * FROM groups WHERE group_id = ?;";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmterror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $gid);
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

function fetch_group_name_by_admin($conn, $uid) {
    $sql = "SELECT * FROM groups WHERE owner_id = ?;";
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
        echo "Group ID: ". $row["group_id"]." (Owner)<br> ";
        echo "Group Name: ". $row["group_name"]." ";
        return $row["group_id"];
    }
    else {
        mysqli_stmt_close($stmt);
        return false;
    }
}

function fetch_group_id_by_admin($conn, $uid) {
    $sql = "SELECT * FROM groups WHERE owner_id = ?;";
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
        return $row["group_id"];
    }
    else {
        mysqli_stmt_close($stmt);
        return false;
    }
}


function fetch_group_name_by_user($conn, $uid) {
    $sql = "SELECT * FROM from_group WHERE user_id = ?;";
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
        echo "Group ID: ". $row["group_id"]."<br> ";
        $gid = $row["group_id"];
        $groupname = fetch_group_name_by_id($conn, $gid);

        echo "Group Name: ". $groupname." ";
        return $row["group_id"];
    }
    else {
        mysqli_stmt_close($stmt);
        return false;
    }
}

function fetch_group_id_by_user($conn, $uid) {
    $sql = "SELECT * FROM from_group WHERE user_id = ?;";
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
        return $row["group_id"];
    }
    else {
        mysqli_stmt_close($stmt);
        return false;
    }
}



function print_group_button($conn, $uid) {
    $sql = "SELECT * FROM from_group WHERE user_id = ?;";
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
        $gid = $row["group_id"];
        echo "<br><a href=\"group.php?gid=$gid\"><button type=\"button\" class=\"btn btn-mid btn-outline-secondary\">Group</button></a>";
  
        return $row["group_id"];
    }
    else {
        mysqli_stmt_close($stmt);
        return false;
    }
}

function request_group_button($conn, $uid) {
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
        echo "<br><a href=\"group_change.php?uid=$uid\"><button type=\"button\" class=\"btn btn-mid btn-outline-secondary\">Request/Change Group</button></a>";
  
        return true;
    }
    else {
        mysqli_stmt_close($stmt);
        return false;
    }
}



function print_group_button_admin($conn, $uid) {
    $sql = "SELECT * FROM groups WHERE owner_id = ?;";
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
        $gid = $row["group_id"];
        echo "<br><a href=\"group.php?gid=$gid\"><button type=\"button\" class=\"btn btn-mid btn-outline-secondary\">Group</button></a>";
  
        return $row["group_id"];
    }
    else {
        mysqli_stmt_close($stmt);
        return false;
    }
}




function fetch_group_name_by_id($conn, $gid) {
    $sql = "SELECT * FROM groups WHERE group_id = ?;";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmterror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $gid);
    mysqli_stmt_execute($stmt);

    $query_result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($query_result)) {
        mysqli_stmt_close($stmt);
        return $row["group_name"];
    }
    else {
        mysqli_stmt_close($stmt);
        return false;
    }
}

function fetch_group_owner_by_id($conn, $gid) {
    $sql = "SELECT * FROM groups WHERE group_id = ?;";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmterror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $gid);
    mysqli_stmt_execute($stmt);

    $query_result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($query_result)) {
        mysqli_stmt_close($stmt);
        return $row["owner_id"];
    }
    else {
        mysqli_stmt_close($stmt);
        return false;
    }
}


function print_group_table($conn) {
    $sql = "SELECT * FROM groups ORDER BY group_id ASC;";
    // here we don't need to bind a prepared statement as you couldn't do 
    $query_result = mysqli_query($conn, $sql);
    echo "<thead>
            <tr>
              <th>Group Id</th>
              <th>Owner Id</th>
              <th>Group Name</th>
              <th>Manage</th>
            </tr>
            </thead>
            <tbody>";
    if($query_result) {
        while($row = mysqli_fetch_assoc($query_result)) {
            echo "<tr>";
            echo "<td>{$row["group_id"]}</td>";
            echo "<td>{$row["owner_id"]}</td>";
            echo "<td>{$row["group_name"]}</td>";
            echo "<td>
                <div class=\"btn-group mr-2\">
                <a href=\"admin_change_group.php?gid={$row["group_id"]}\"><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Change</button></a>
                <a href=\"includes/delete_group_inc.php?gid={$row["group_id"]}\"><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Remove</button>
                </div>
                </td>";
        }
    }
    echo "</tbody>";



    mysqli_free_result($query_result);
}

function print_group_owner_table($conn) {
    $sql = "SELECT * FROM groups ORDER BY group_id ASC;";
    // here we don't need to bind a prepared statement as you couldn't do 
    $query_result = mysqli_query($conn, $sql);
    echo "<thead>
            <tr>
              <th>Group Id</th>
              <th>Group Name</th>
              <th>Owner Name</th>
              <th>Owner Email</th>
              <th>Change/Request</th>
            </tr>
            </thead>
            <tbody>";
    if($query_result) {
        while($row = mysqli_fetch_assoc($query_result)) {
            echo "<tr>";
            echo "<td>{$row["group_id"]}</td>";
            echo "<td>{$row["group_name"]}</td>";
            $uid = $row["owner_id"];
            $cod = fetch_user_by_id($conn, $uid);
            echo "<td>{$cod["name"]}</td>";
            echo "<td>{$cod["email"]}</td>";           
            echo "<td>
            <div class=\"btn-group mr-2\">
                <a href=\"send_email.php?uid=$uid\"><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Notify</button></a>
                </div>

                </td>";
        }
    }
    echo "</tbody>";



    mysqli_free_result($query_result);
}


function print_from_group_table_from_id($conn,$gid) {
     $sql = "SELECT * FROM from_group WHERE group_id = ?;";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmterror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $gid);
    mysqli_stmt_execute($stmt);
        
    $query_result = mysqli_stmt_get_result($stmt);
    $groupname = fetch_group_name_by_id($conn, $gid);
    $groupownerid = fetch_group_owner_by_id($conn, $gid);
    $ownername = fetch_name_by_id($conn, $groupownerid);
    $cod = fetch_user_by_id($conn, $groupownerid);
    echo "<h4>Group Name: ".$groupname."</h4><br>";
    echo "<h5>Group Owner: ".$ownername."</h5> ";
    echo "<h5>Owner Email: ".$cod["email"]."</h5>";
    echo "<a href=\"send_email.php?uid=$groupownerid\"><button type=\"button\" class=\"btn btn-md btn-outline-secondary\">Message</button></a><br><br>";
    if($query_result) {
    echo "<thead>
            <tr>
              <th>Name</th>
              <th>Primary Address</th>
              <th>Email</th>
              <th>Message</th>
            </tr>
            </thead>
            <tbody>";
        while($row = mysqli_fetch_assoc($query_result)) {
            echo "<tr>";
            $uid = $row["user_id"];
            $username = fetch_name_by_id($conn, $uid);
            $col = fetch_user_by_id($conn, $uid);

            echo "<tr>";
            echo "<td>{$username}</td>";
            echo "<td>{$col["primary_address"]}</td>";
            echo "<td>{$col["email"]}</td>";
            echo "<td>
                <div class=\"btn-group mr-2\">
                <a href=\"send_email.php?uid=$uid\"><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Message</button></a>
                </div>
                </td>";
        }
    }
    echo "</tbody>";
        

    mysqli_free_result($query_result);
    mysqli_close($conn);
}






function print_from_group_table($conn) {
    $sql1 = "SELECT * FROM from_group ORDER BY group_id ASC;";
    // here we don't need to bind a prepared statement as you couldn't do 

    $query_result1 = mysqli_query($conn, $sql1);
    echo "<thead>
            <tr>
              <th>Group Id</th>
              <th>Group Name</th>
              <th>Name</th>           
              <th>Manage</th>
            </tr>
            </thead>
            <tbody>";
    if($query_result1) {
        while($row = mysqli_fetch_assoc($query_result1)) {
            $uid = $row["user_id"];
            $username = fetch_name_by_id($conn, $uid);
            $gid = $row["group_id"];
            $groupname = fetch_group_name_by_id($conn, $gid);
            echo "<tr>";
            echo "<td>{$row["group_id"]}</td>";
            echo "<td>{$groupname}</td>";
            echo "<td>{$username}</td>";
            echo "<td>
                <div class=\"btn-group mr-2\">
                <a href=\"admin_change_group_user.php?uid={$uid}\"><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Change</button></a>
                <a href=\"includes/delete_group_inc.php?uid={$uid}\"><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Remove</button>
                </div>
                </td>";
        }
    }
    echo "</tbody>";  

    mysqli_free_result($query_result1);

}


function print_single_from_group_table($conn, $uid) {
    $sql = "SELECT * FROM from_group WHERE user_id = ?;";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmterror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $uid);
    mysqli_stmt_execute($stmt);

    $query_result = mysqli_stmt_get_result($stmt);

    echo "<thead>
            <tr>
              <th>Group Id</th>
              <th>Group Name</th>
              <th>Name</th>           
            </tr>
            </thead>
            <tbody>";
    if($query_result) {
        while($row = mysqli_fetch_assoc($query_result)) {
            $uid = $row["user_id"];
            $username = fetch_name_by_id($conn, $uid);
            $gid = $row["group_id"];
            $groupname = fetch_group_name_by_id($conn, $gid);
            echo "<tr>";
            echo "<td>{$row["group_id"]}</td>";
            echo "<td>{$groupname}</td>";
            echo "<td>{$username}</td>";
        }
    }
    echo "</tbody>";  

    mysqli_free_result($query_result);

}




function print_groups_posts($conn,$gid) {
    require_once "functions_inc.php";
    require_once "group_functions_inc.php";
    
    $sql = "SELECT * FROM group_posts WHERE group_id=? ORDER BY post_date DESC;";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmterror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $gid);
    mysqli_stmt_execute($stmt);

    $query_result = mysqli_stmt_get_result($stmt);

    echo '<div class="row mb-2 margin-top">';
    if($query_result) {
        while($row = mysqli_fetch_assoc($query_result)) {  
            

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

            echo '
                <div class="col-md-5">
                    <div class="row no-gutters border rounded mb-4 shadow-sm h-md-250">
                        <div class="col p-4">
                            <strong class="mb-2 ">'.$user["name"].'</strong>
                            <div class="mb-1 text-muted">'. $row["post_date"] .'</div>
                            <h3 class="card-text mb-auto">'. $content .'</h3>
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




/*

function print_single_user_table($conn, $gid) {
    echo "<thead>
            <tr>
              <th>Group Id</th>
              <th>Owner Id</th>
              <th>Group Name</th>
            </tr>
            </thead>
            <tbody>";

    if($row = fetch_group_by_id($conn, $gid)) {
        echo "<tr>";
        echo "<td>{$row["group_id"]}</td>";
        echo "<td>{$row["owner_id"]}</td>";
        echo "<td>{$row["group_name"]}</td>";
    }
    echo "</tbody>";
}

*/

function print_single_group_table($conn, $gid) {
    echo "<thead>
            <tr>
              <th>Group Id</th>
              <th>Owner Id</th>
              <th>Group Name</th>
            </tr>
            </thead>
            <tbody>";

    if($row = fetch_group_by_id($conn, $gid)) {
        echo "<tr>";
        echo "<td>{$row["group_id"]}</td>";
        echo "<td>{$row["owner_id"]}</td>";
        echo "<td>{$row["group_name"]}</td>";
    }
    echo "</tbody>";
}

function delete_group_2($conn, $gid){
    $sql = "DELETE FROM groups WHERE group_id = ?;";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "i", $gid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

}

function delete_group($conn, $gid) {
    $sql1 = "DELETE FROM from_group WHERE group_id = ?;";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection

    if(!mysqli_stmt_prepare($stmt, $sql1)) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "s", $gid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    delete_group_2($conn,$gid);
    return true;
}


function delete_group_user($conn, $uid) {
    $sql = "DELETE FROM from_group WHERE user_id = ?;";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "s", $uid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}





/*
function email_already_taken($conn, $email) {
    $invalid = false;

    if(fetch_user($conn, $email) !== false)
        $invalid = true;

    return $invalid;
}

function invalid_password($password, $password_confirm) {
    $invalid = false;
    if ($password != $password_confirm)
        $invalid = true;

    return $invalid;
}

function invalid_password_length($password) {
    $invalid = false;
    if (strlen($password) < 6)
        $invalid = true;

    return $invalid;
}


function create_user($conn, $name, $email, $password, $address, $privilege) {
    $sql = "INSERT INTO condo_owners (name, email, password, address, privilege) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }    

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    switch($privilege) {
        case "Standard user":
            $privilege = "user";
        break;
        case "Administrator":
            $privilege = "admin";
        break;
    }

    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $hashed_password, $address, $privilege);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}

function delete_user($conn, $uid) {
    $sql = "DELETE FROM condo_owners WHERE user_id = ?;";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "i", $uid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}



function login_user($conn, $email, $password) {
    $user = fetch_user($conn, $email);

    if($user === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
        
    // for the admin user password = admin, since its password isn't hashed
    // we have a special case. 
    // here uid will always be 1 for admin
    if($user["user_id"] == 1 && $user["password"] == "admin" && $password == "admin") {
        session_start();
        $_SESSION["user_id"] = $user["user_id"];
        $_SESSION["name"] = $user["name"];
        $_SESSION["email"] = $user["email"];
        $_SESSION["privilege"] = $user["privilege"];
        header("location: ../settings.php?error=changeadmin");
        exit();
    }    
    
    $password_hashed = $user["password"];
    $password_check = password_verify($password, $password_hashed);

    // normally passwords will always be hashed, unless it's the default admin user.
    // however, for the purpose of this project, we've populated the tables with dummy data
    // these users have plain text passwords.
    // This is what we're checking here, this would not be in the deployable version
    if($user["password"] == "$password") {
        session_start();
        $_SESSION["user_id"] = $user["user_id"];
        $_SESSION["name"] = $user["name"];
        $_SESSION["email"] = $user["email"];
        $_SESSION["privilege"] = $user["privilege"];
        header("location: ../settings.php?error=changecredentials");
        exit();
    }

    else if($password_check === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } 
    else {
        session_start();
        $_SESSION["user_id"] = $user["user_id"];
        $_SESSION["name"] = $user["name"];
        $_SESSION["email"] = $user["email"];
        $_SESSION["privilege"] = $user["privilege"];
        header("location: ../index.php");
        exit();
    }
}

function change_user_password($conn, $uid, $password, $new_password) {
    $user = fetch_user_by_id($conn, $uid);

    $password_hashed = $user["password"];
    $password_check = password_verify($password, $password_hashed);

    // base case if the user is the admin with default admin pwd
    if($user["user_id"] == 1 && $user["password"] == "admin") {
        if($password != "admin") { // since "admin" isn't hashed
            header("location: ../settings.php?error=wrongpassword");
            exit();
        }
    }
    // normally passwords will always be hashed, unless it's the default admin user.
    // however, for the purpose of this project, we've populated the tables with dummy data
    // these users have plain text passwords.
    // This is what we're checking here, this would not be in the deployable version
    if($user["password"] == "$password") {
        // pass the hash check
    }

    else if($password_check === false) {
        header("location: ../settings.php?error=wrongpassword");
        exit();
    } 
    
    $sql = "UPDATE condo_owners SET password = ? WHERE user_id = ?;";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../setting.php?error=stmterror");
        exit();
    }

    $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    
    mysqli_stmt_bind_param($stmt, "si", $new_hashed_password, $uid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../settings.php?error=none");
    exit();
}

// for admin use
function admin_change_user_name($conn, $uid, $name) {
    $user = fetch_user_by_id($conn, $uid);
    $sql = "UPDATE condo_owners SET name = ? WHERE user_id = ?;";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }
        
    mysqli_stmt_bind_param($stmt, "si", $name, $uid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}
*/
function admin_change_group_name($conn, $gid, $group_name) {
    $group = fetch_group_by_id($conn, $gid);
    $sql = "UPDATE groups SET group_name = ? WHERE group_id = ?;";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }
        
    mysqli_stmt_bind_param($stmt, "si", $group_name, $gid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}

function admin_change_user_group($conn, $uid, $gid) {
    $sql = "UPDATE from_group SET group_id = ? WHERE user_id = ?;";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }
        
    mysqli_stmt_bind_param($stmt, "ss", $gid, $uid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}
/*
// for admin use
function admin_change_user_address($conn, $uid, $address) {
    $user = fetch_user_by_id($conn, $uid);
    $sql = "UPDATE condo_owners SET address = ? WHERE user_id = ?;";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }
        
    mysqli_stmt_bind_param($stmt, "si", $address, $uid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}
// for admin use
function admin_change_user_email($conn, $uid, $email) {
    $user = fetch_user_by_id($conn, $uid);
    $sql = "UPDATE condo_owners SET email = ? WHERE user_id = ?;";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }
        
    mysqli_stmt_bind_param($stmt, "si", $email, $uid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}

// for admin use
function admin_change_user_password($conn, $uid, $password) {
    $user = fetch_user_by_id($conn, $uid);
    $sql = "UPDATE condo_owners SET password = ? WHERE user_id = ?;";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }
        
    $new_hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    mysqli_stmt_bind_param($stmt, "si", $new_hashed_password, $uid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}

// for admin use
function admin_change_user_privilege($conn, $uid, $privilege) {
    $user = fetch_user_by_id($conn, $uid);
    $sql = "UPDATE condo_owners SET privilege = ? WHERE user_id = ?;";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }
            
    switch($privilege) {
        case "Standard user":
            $privilege = "user";
        break;
        case "Administrator":
            $privilege = "admin";
        break;
    }

    mysqli_stmt_bind_param($stmt, "ss", $privilege, $uid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}

*/