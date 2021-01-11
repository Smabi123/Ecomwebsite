<?php 
include('header.php');
include_once("db_connect.php");
session_start();
$error = '';
if(isset($_POST["user_login"])) {
	$user_email=$_POST["user_email"];
	$user_password=$_POST["user_password"];
	$sql_query="SELECT id, email, password, first_name, last_name FROM gallery_user WHERE email='$user_email' AND password='$user_password'";
	$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
	$row=mysqli_fetch_array($resultset);
	if(mysqli_num_rows($resultset)>0) {
		$_SESSION["userid"]=$row["id"];
		$_SESSION["name"]=$row["first_name"]." ".$row["last_name"];
		header("location:user.php");
	} else {
		$error =  "Login failed! Please try again.";
	}	
}
if (isset($_SESSION['userid'])) {
	header("location:user.php");
}
?>
<title>coderszine.com : Demo of Image Gallery with jQuery, PHP & MySQL</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<?php include('container.php');?>
<div class="container">	
	<h2>Example: Build Image Gallery with jQuery, PHP & MySQL</h2>	
	<br>
	<br>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
				<fieldset>
				    <?php if ($error) { ?>						
					<div class="alert alert-danger">
					  <?php echo $error; ?>
					</div>				
					<?php } ?>		
					<legend>Login</legend>						
					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="user_email" required class="form-control" value="test@coderszine.com" />
					</div>	
					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="user_password" required class="form-control" value="test" />
					</div>	
					<div class="form-group">
						<input type="submit" name="user_login" value="Login" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>			
		</div>
	</div>
	
	<div style="margin:50px 0px 0px 0px;">
		<a class="btn btn-default read-more" style="background:#3399ff;color:white" href="http://www.coderszine.com/build-image-gallery-with-jquery-php-mysql/">Back to Tutorial</a>		
	</div>
</div>
<?php include('footer.php');?>
