
<?php // 40058095
    include_once "admin_header.php";
?>

<div class=container-fluid>
<h2>Post Admin Announcement</h2>
<?php
    if (isset($_GET["error"])) {

        echo "<div class=\"sm-margin-top alert alert-success\" role=\"alert\">";
        switch ($_GET["error"]) {
            case "none":
                echo "Successfuly posted announcement.";
            break;
        }
        echo "</div>";
    }
?>
<div class="row justify-content-start">
<div class="col-lg-6">
<!-- _inc.php files are include files -->
<form action="includes/post_inc.php" method="post">

    <div class="form-group">
        <label for="name">Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>      
    <div class="form-group">
        <label for="email">Content</label>
        <textarea name="content" class="form-control" rows="4" required></textarea>
    </div>
    <div class="form-group">
        <label for="privilege">Visibility</label>
        <select class="form-control" name="visibility" required>
            <option>public</option>
            <option>user</option>
            <option>admin</option>
        </select>
    </div>
    <button type="submit" name="post_announcement" class="btn btn-light">Post</button>

</form>


</div>
</div>
</div>

<?php
    include_once "admin_footer.php";
?>

