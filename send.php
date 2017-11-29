<?php 

session_start();
if(!isset($_SESSION['user1'])){
	header('location:index.php');
}
$reciever = $_REQUEST['reciever'];
$sender  = $_REQUEST['sender'];
$message = $_REQUEST['message'];
$myname = $_REQUEST['sender_name'];
$yourname = $_REQUEST['rec_name'];

// echo $myname;

// echo $yourname;

include('db.php');

if(!$con){
	die('Could Not Connect'. mysql_error());
}

$query = "INSERT INTO chats (message, sender_id, rec_id,sender_name, rec_name) VALUES ('$message','$sender','$reciever','$myname','$yourname')";


if(mysqli_query($con, $query)){


// window.location = "location:chat.php?id=".$reciever."&name=".$yourname ;
clearstatcache();

header('location:chat.php?id='.$reciever.'&name='.$yourname);


} else{

echo "error";
}
mysqli_close($con);







?>