
<?php 
session_start();
if(!isset($_SESSION['user1'])){
  header('location:index.php');
}
if(!isset($_GET['id'])){
	header('location:profile.php');
}
if(!isset($_GET['name'])){
  header('location:profile.php');
}
if($_GET['name'] == ""){
  header('location:profile.php');
}
$you = $_GET['id'];
$me = $_SESSION['user1'];

$myname = $_SESSION['myname'];
$yourname = $_GET['name'];
       ?>
<html>
<head>
  <title>chat</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.xa{
  color: blue;
  background-color:lightgrey;
}
.xb{
  color: red;
  background-color:#e6e6b9;
}
</style>

<script>
window.onload=function () {
     var objDiv = document.querySelector('#message-box');
     console.log(objDiv);
     objDiv.scrollTop = objDiv.scrollHeight;
}


</script>

</head>
<body style="background-image:url('images/background1.jpg')">
<div class="container" style="overflow:auto;" >
</br>
</br>
<div id="message-box" style="width:100%; border:2px solid red; height:300px;overflow-y:scroll; padding:10px; background-color:white;">
<?php
include('db.php');
if(!$con){
	die('Could not connect'. mysql_error());
}
	
    
	$query= "SELECT * FROM chats  WHERE sender_id = {$me}  AND rec_id = {$you} OR sender_id = {$you}  AND rec_id = {$me} ORDER BY c_id ";



    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_assoc($result)){

        $text = $row['message'];
        $name = $row['sender_name'];
        $send_id = $row['sender_id'];
        $recv_id = $row['rec_id'];

if($send_id == $me){
 $class="xa";
} else{
  $class= "xb";
}
    //  if($chat_id == $you && $recv_id == $me ){

    //    echo "redd";
    //     // $class = "xa";
    // }
     // }else if($chat_id == $you) {
     //  $class = "xb";
     // }
        
       echo "<table class='$class' style='width:100%'>";
       echo "<tr>";
        echo "<td>" ;
                echo "<td class='$class'>" ;
        echo $name. "  :".$text;
       echo "</td>";
       echo "</tr>";
       echo "</table>";
       echo " </br>";
        
  
}
?>

<!-- chat will go here -->

</div>
<form action="send.php" method="post">
<div class="form-group">
	<input type="hidden" name="sender" value="<?php echo $me ?>">
	<input type="hidden" name="reciever" value="<?php echo $you ?> ">
	<input type="hidden" name="sender_name" value="<?php echo $myname ?>">
	<input type="hidden" name="rec_name" value="<?php echo $yourname ?>">
  <label for="comment" ><h1>Message: </h1></label>
  <textarea class="form-control" rows="5" id="message" name="message" placeholder="First name"> </textarea>
</br>
  <button class="btn btn-primary" style="width:150px; ">Send</button> <button class="btn btn-danger" style="width:100px; float:right;" onclick="logoutMe()" >Logout</button>

</div>
</form>
<script>
function logoutMe(){
  window.location="index.php?action=logout";
}
</script>
</div>
</body>
</html>
