<?php
session_start();
$a = $_REQUEST['text'];
$b = $_REQUEST['pwd'];

include('db.php');
if(!$con){
	die('Could Not Connect' . mysql_error());
}

$query = "SELECT * FROM users WHERE u_name ='" .$a ."'";
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_assoc($result))
{

$pass = $row['password'];
$u_id = $row['id'];

}


 
 if($pass == $b){
    $_SESSION['user1'] = $u_id;
    $_SESSION['myname'] = $a;
 	header('location:profile.php');
 }
 else{
 	echo "failed to connect";
 }



?>