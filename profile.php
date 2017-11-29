
<html lang="en">
<head>
  <title>Chat</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>


<?php  
session_start();
$me_user = $_SESSION['user1'];
include('db.php');
if(!$con){
	die('Could not Connect'. mysqli_error());
}

$query = "SELECT * FROM users WHERE id NOT IN ($me_user)";
$result = mysqli_query($con, $query);

while($row = mysqli_fetch_assoc($result))
{
$a = $row['id'];
$b = $row['u_name'];


echo "</br>";
echo "</br>";
echo "<div class='container'>";
echo "<table class='table table-bordered'>";
echo "<tr>";
echo "<td>";
echo "<a href=chat.php?id=$a&name=$b>";

echo "$b </a>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";
}





?>



</html>