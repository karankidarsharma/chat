<?php  

if(!isset($_SESSION['user1'])){
	header('location:index.php');
}
$con = mysqli_connect('localhost','root','','chat');

?>