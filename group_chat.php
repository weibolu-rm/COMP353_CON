<?php // 40024592
    include_once "templates/header.php";
?>

<div class="table-responsive sm-margin-top">
<table class="table table-striped table-sm">
    <?php
        require_once "includes/db_handler_inc.php";
        require_once "includes/functions_inc.php";
        require_once "includes/group_functions_inc.php";
        $uid = $_SESSION["user_id"];
        if(fetch_group_id_by_user($conn, $uid)){
        $gid = fetch_group_id_by_user($conn, $uid);
        }
         else{
        $gid = fetch_group_id_by_admin($conn, $uid);
        }

        echo "<h2>Group Chat</h2><br>";
        $gname = fetch_group_name_by_id($conn, $gid);

        echo "<h3>Group Chat Room : ".$gid."</h3>";
    ?>
</table>
</div>

<?php
    require_once "includes/db_handler_inc.php";
    require_once "includes/functions_inc.php";
    require_once "includes/group_functions_inc.php";
        $uid = $_SESSION["user_id"];
        if(fetch_group_id_by_user($conn, $uid)){
        $gid = fetch_group_id_by_user($conn, $uid);
        }
         else{
        $gid = fetch_group_id_by_admin($conn, $uid);
        }
        print_groups_posts($conn,$gid);



?>

<button class="open-button" onclick="openForm()">Chat</button>
<span class="chat-popup" id="myForm" >
    <?php
  echo '<form action="includes/group_chat_post_inc.php?gid={'.$gid.'}" method="post"  class="form-container" id="chatbox">'

  ?>

    <h1>Chat</h1>

    <label for="msg"><b>Message</b></label>
    <textarea name="content" placeholder="Type message.." class="form-control" required></textarea>

    <button type="submit" name="group_post" class="btn">Send</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</span>

        <script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>










<?php
    include_once "templates/footer.php";
?>

