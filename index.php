<!-- <html>

<input type="text" maxlength="10" name="text">
</br>
</br>
<input type="password" name="pwd">
</br>
</br>
<input type="submit">
</form>

</html> -->
<?php
session_start();
if(isset($_GET['action']) == 'logout'){
	session_destroy();
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Chat me</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  input{
  	max-width: 270px;
  }
  </style>
</head>
<body>

<div class="container">
  <h2>Login</h2>
 <form method="post" action="validate.php"> 
    <div class="form-group">
      <label for="usr">Name:</label>
      <input type="text" class="form-control" id="usr" name="text">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="pwd" id="pwd">
      </br>
</br>
<input type="submit" class="btn btn-success">
    </div>
  </form>
</div>

</body>
</html>
