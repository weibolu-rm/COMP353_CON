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


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the chat form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 5px 5px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 200px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:5px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

#chatbox{
      background-color: #2c2c2c;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
</head>
<body>

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
</body>
</html>









<?php
    include_once "templates/footer.php";
?>

