<?php //40058095
    require_once "config_inc.php";
    session_start();

if (isset($_POST["user_post"])) {
    $uid = $_SESSION["user_id"];
    $title = $_POST["title"];    
    $content = $_POST["content"];
    $visibility = $_POST["visibility"];


    require_once "post_functions_inc.php";
    require_once "db_handler_inc.php";

    // IMAGE
    if(file_exists($_FILES["img_file"]["tmp_name"]) || is_uploaded_file($_FILES["img_file"]["tmp_name"])) {
        $file_name = $_FILES["img_file"]["name"];
        $file_tmp = $_FILES["img_file"]["tmp_name"];
        $file_size = $_FILES["img_file"]["size"];
        $file_error = $_FILES["img_file"]["error"];
        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        $allowed_img_types = array("jpg", "jpeg", "png", "gif");

        if($file_error !== 0) {
            header("location: ../{$user_post_url }?error=imgerror");
            exit();
        } 
        if(!in_array($file_type, $allowed_img_types) || getimagesize($file_tmp) === false) {
            header("location: ../{$user_post_url }?error=imgtype");
            exit();
        }

        if($file_size > 5242880) { // 5MB
            header("location: ../{$user_post_url }?error=imgsize");
            exit();
        }
        // get next post id for name
        // $auto_increment = next_post_id($conn);
        $unique_id = uniqid();
        $img_name = $unique_id . "." . $file_type;
        $target_dir = "../uploads/";
        $file_destination = $target_dir . $img_name;

        if(move_uploaded_file($file_tmp, $file_destination) === false) {
            header("location: ../{$user_post_url }?error=imgupload");
            exit();
        }
        else {    
            // post with image
            if(create_post($conn, $uid, $title, $content, $visibility, $img_name, false) === false) {
                header("location: ../{$user_post_url }?error=stmterror");
                exit();
            }
            else {
                header("location: ../{$user_post_url }?error=none");
                exit();
            }

        }
    } // endif for image post

    // NO IMAGE
    if(create_post($conn, $uid, $title, $content, $visibility, "none", false) === false) {
        header("location: ../{$user_post_url }?error=stmterror");
        exit();
    }
    else {
        header("location: ../{$user_post_url }?error=none");
        exit();
    }
    

}

// will send users back to login page if they accessed this include illegally
else {
    header("location: ../{$user_post_url}");
    exit();
}