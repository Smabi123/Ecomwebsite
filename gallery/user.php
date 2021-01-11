<?php 
include('header.php');
include_once("db_connect.php");
session_start();
?>
<title>coderszine.com : Demo of Image Gallery with jQuery, PHP & MySQL</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<?php include('container.php');?>
<div class="container">	
	<h2>Example: Build Image Gallery with jQuery, PHP & MySQL</h2>	
	<br>
	<br>
	<div class="collapse navbar-collapse" id="navbar1">
		<ul class="nav navbar-nav navbar-left">
			<?php if (isset($_SESSION['userid'])) { ?>
			<li><p class="navbar-text"><strong>Welcome!</strong> You're signed in as <strong><?php echo $_SESSION['name']; ?></strong></p></li>
			<br>
			<li><a href="gallery.php"><strong>View Gallery</strong></a></li>
			<li><a href="logout.php">Log Out</a></li>
			<?php } else { ?>
			<li><a href="index.php">Login</a></li>				
			<?php } ?>
		</ul>
	</div>	
	<br>
	<div style="margin:50px 0px 0px 0px;">
		<a class="btn btn-default read-more" style="background:#3399ff;color:white" href="http://www.coderszine.com/build-image-gallery-with-jquery-php-mysql">Back to Tutorial</a>	
	</div>
</div>
<?php include('footer.php');?>
