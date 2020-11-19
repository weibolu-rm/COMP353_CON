<?php

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
    $sql = "SELECT * FROM user WHERE uemail = ?;";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../{$registration_url}?error=stmterror");
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

function print_user_table($conn) {
    $sql = "SELECT * FROM user ORDER BY uid ASC";
    // here we don't need to bind a prepared statement as you couldn't do 
    $query_result = mysqli_query($conn, $sql);
    echo "<thead>
            <tr>
              <th>uid</th>
              <th>Name</th>
              <th>Email</th>
              <th>Privilege</th>
            </tr>
            </thead>
            <tbody>";
    if($query_result) {
        while($row = mysqli_fetch_assoc($query_result)) {
            echo "<tr>";
            echo "<td>{$row["uid"]}</td>";
            echo "<td>{$row["uname"]}</td>";
            echo "<td>{$row["uemail"]}</td>";
            echo "<td>{$row["uprivilege"]}</td>";
            echo "</tr>";
        }
    }
    echo "</tbody>";
        

    mysqli_free_result($query_result);
    mysqli_close($conn);
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

function create_user($conn, $name, $email, $password, $privilege) {
    $sql = "INSERT INTO user (uname, uemail, upassword, uprivilege) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../{$registration_url}?error=stmterror");
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    switch($privilege) {
        case "Standard user":
            $privilege = 9;
        break;
        case "Administrator":
            $privilege = 1;
        break;
    }

    mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $hashed_password, $privilege);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../admin_registration.php?error=none");
    exit();
}

function login_user($conn, $email, $password) {
    $user = fetch_user($conn, $email);

    if($user === false) {
        header("location: ../{$login_url}?error=wronglogin");
        exit();
    }
    
    // for the admin user password = admin, since its password isn't hashed
    // we have a special case. 
    // here uid will always be 1 for admin

    if($user["uid"] == 1 && $user["upassword"] == "admin") {
        session_start();
        $_SESSION["uid"] = $user["uid"];
        $_SESSION["uname"] = $user["uname"];
        $_SESSION["uprivilege"] = $user["uprivilege"];
        header("location: ../index.php");
        exit();
    }

    $password_hashed = $user["upassword"];
    $password_check = password_verify($password, $password_hashed);

    if($password_check === false) {
        header("location: ../{$login_url}?error=wronglogin");
        exit();
    } 
    else {
        session_start();
        $_SESSION["uid"] = $user["uid"];
        $_SESSION["uname"] = $user["uname"];
        $_SESSION["uprivilege"] = $user["uprivilege"];
        header("location: ../index.php");
        header("location: ../index.php");
        exit();
    }
}

