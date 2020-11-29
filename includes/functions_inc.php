<?php // 40058095

function invalid_email($email) {
    $invalid = false;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        $invalid = true;
    
    
    return $invalid;
}

function invalid_name($name) {
    $invalid = false;
    if (!preg_match("/^[a-zA-Z\s]*$/", $name)) 
        $invalid = true;
    
    return $invalid;
}

function fetch_user($conn, $email) {
    $sql = "SELECT * FROM condo_owners WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../admin_registration.php?error=stmterror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
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

function print_user_table($conn) {
    $sql = "SELECT * FROM condo_owners ORDER BY user_id ASC;";
    // here we don't need to bind a prepared statement as you couldn't do 
    $query_result = mysqli_query($conn, $sql);
    echo "<thead>
            <tr>
              <th>uid</th>
              <th>Name</th>
              <th>Email</th>
              <th>Address</th>
              <th>Privilege</th>
              <th>Manage</th>
            </tr>
            </thead>
            <tbody>";
    if($query_result) {
        while($row = mysqli_fetch_assoc($query_result)) {
            echo "<tr>";
            echo "<td>{$row["user_id"]}</td>";
            echo "<td>{$row["name"]}</td>";
            echo "<td>{$row["email"]}</td>";
            echo "<td>{$row["address"]}</td>";
            echo "<td>{$row["privilege"]}</td>";
            echo "<td>
                <div class=\"btn-group mr-2\">
                <a href=\"admin_change_user.php?uid={$row["user_id"]}\"><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Change</button></a>
                <a href=\"includes/delete_inc.php?uid={$row["user_id"]}\"><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Remove</button>
                </div>
                </td>";
        }
    }
    echo "</tbody>";
        

    mysqli_free_result($query_result);
    mysqli_close($conn);
}

function print_single_user_table($conn, $uid) {
    echo "<thead>
            <tr>
              <th>uid</th>
              <th>Name</th>
              <th>Email</th>
              <th>Address</th>
              <th>Privilege</th>
            </tr>
            </thead>
            <tbody>";

    if($row = fetch_user_by_id($conn, $uid)) {
        echo "<tr>";
        echo "<td>{$row["user_id"]}</td>";
        echo "<td>{$row["name"]}</td>";
        echo "<td>{$row["email"]}</td>";
        echo "<td>{$row["address"]}</td>";
        echo "<td>{$row["privilege"]}</td>";
    }
    echo "</tbody>";
}

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
        header("location: ../admin_registration.php?error=stmterror");
        exit();
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
    header("location: ../admin_registration.php?error=none");
    exit();
}

function delete_user($conn, $uid) {
    $sql = "DELETE FROM condo_owners WHERE user_id = ?;";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../admin.php?error=stmterror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $uid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../admin.php?error=none");
    exit();

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
