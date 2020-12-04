
<?php // 40058095
    include_once "templates/header.php";
?>

<div class=container-fluid>
<h2>Create Post</h2>
<?php
    if (isset($_GET["error"])) {        
        $message_type = "danger";
        if ($_GET["error"] == "none" || strpos($_GET["error"], "success") !== false)
            $message_type = "success";

        echo "<div class=\"sm-margin-top alert alert-{$message_type}\" role=\"alert\">";
        switch ($_GET["error"]) {
            case "none":
                echo "Successfuly post posted.";
            break;
            case "imgerror":
                echo "There was a problem with your file.";
            break;
            case "imgsize":
                echo "Image file too big. Max 5MB.";
            break;
            case "imgtype":
                echo "Image file must be of type jpg, jpeg, png or gif.";
            break;
            case "imgupload":
                echo "There was a problem uploading your imagage.";
            break;
        }
        echo "</div>";
    }
?>
<div class="row justify-content-start">
<div class="col-lg-6">
<!-- _inc.php files are include files -->
<form action="includes/user_post_inc.php" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="name">Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>      
    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" class="form-control" rows="4" required></textarea>
    </div>
    <div class="form-group">
        <label for="privilege">Visibility</label>
        <select class="form-control" name="visibility" required>
            <option>public</option>
            <option>user</option>
            <option>group</option>
        </select>
    </div>
     <div class="form-group">
        <label for="exampleFormControlFile1">Upload image</label>
        <input type="file" class="form-control-file" name="img_file">
    </div>
    <button type="submit" name="user_post" class="btn btn-light">Post</button>

</form>


</div>
</div>
</div>

<?php
    include_once "templates/footer.php";
?>

