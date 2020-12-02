<?php
    include_once "templates/email_header.php";
?>

<div class="pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Send Email </h1>
</div>

<div class="row justify-content-start">
<div class="col-lg-6">
<form action="includes/email_inc.php" method="post">

    <div class="form-group">
        <label for="email">Recipient Email</label>
        <input type="text" name="recipient" class="form-control" required>
    </div>      
    <div class="form-group">
        <label for="subject">Subject</label>
        <input type="text" name="subject" class="form-control" required>
    </div>      
    <div class="form-group">
        <label for="">Content</label>
        <textarea name="content" class="form-control" rows="9" required></textarea>
    </div>
    <button type="submit" name="send_email" class="btn btn-light">Send</button>

</form>
</div>
</div>
<?php
    include_once "templates/email_footer.php";
?>