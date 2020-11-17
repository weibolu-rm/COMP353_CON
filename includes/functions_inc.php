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
        header("location: ../registration.php?error=stmterror");
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

function create_user($conn, $name, $email, $password) {
    $sql = "INSERT INTO user (uname, uemail, upwd) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn); // prevents sql injection
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../registration.php?error=stmterror");
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashed_password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../registration.php?error=none");
    exit();
}

function login_user($conn, $email, $password) {
    $user = fetch_user($conn, $email);

    if($user === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $password_hashed = $user["upwd"];
    $password_check = password_verify($password, $password_hashed);

    if($password_check === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } 
    else if ($password_check === true) {
        session_start();
        $_SESSION["uid"] = $user["uid"];
        $_SESSION["uname"] = $user["uname"];
        header("location: ../index.php");
        exit();
    }


}

