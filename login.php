<!--
//login.php
!-->

<?php
require('abstract.databoundobject.php');
include('database_connection.php');
require('class.login.php');
require('class.login_details.php');

session_start();

$message = '';

if(isset($_SESSION['user_id']))
{
	//header('location:index.php');
}

if(isset($_POST["login"]))
{
 
  $loginuser=new Login($connect);
  $loginuser->setUsername($_POST["username"]);
  $loginuser->encontrarID($connect);
  echo $loginuser->getpassword();
  if(password_verify($_POST["password"],str_replace("?","$",$loginuser->getPassword())))
  {
    $_SESSION['user_id'] = $loginuser->getUser_Id();
    $_SESSION['username'] = $loginuser->getUsername();
    $logindetails=new LoginDetails($connect);
    $logindetails->setUser_Id($loginuser->getUser_Id())->Save();
    $_SESSION['login_details_id'] = $connect->lastInsertId();
    header("location:index.php");
  }
  else
  {
   $message = "<label>Wrong UserName/Password</label>";
  }
}


?>

<html>  
    <head>  
        <title>Chat Application using PHP Ajax Jquery</title>  
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>  
    <body>  
        <div class="container">
			<br />
			
			<h3 align="center">Chat Application using PHP Ajax Jquery</h3><br />
			<br />
			<div class="panel panel-default">
  				<div class="panel-heading">Chat Application Login</div>
				<div class="panel-body">
					<p class="text-danger"><?php echo $message; ?></p>
					<form method="post">
						<div class="form-group">
							<label>Enter Username</label>
							<input type="text" name="username" class="form-control" required />
						</div>
						<div class="form-group">
							<label>Enter Password</label>
							<input type="password" name="password" class="form-control" required />
						</div>
						<div class="form-group">
							<input type="submit" name="login" class="btn btn-info" value="Login" />
						</div>
						<div align="center">
							<a href="register.php">Register</a>
						</div>
					</form>
					<br />
					<br />
					<br />
					<br />
				</div>
			</div>
		</div>

    </body>  
</html>