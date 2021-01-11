<?php 
include('header.php');
include_once("db_connect.php");
session_start();
?>
<title>coderszine.com : Demo of Image Gallery with jQuery, PHP & MySQL</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="dist/css/lightbox.min.css">
<script type="text/javascript" src="dist/js/lightbox-plus-jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="style.css" />
<?php include('container.php');?>
<div class="container">	
	<h2>Example: Build Image Gallery with jQuery, PHP & MySQL</h2>	
	<div class="row">
	<div class="collapse navbar-collapse" id="navbar1">
		<ul class="nav navbar-nav navbar-left">
			<?php if (isset($_SESSION['userid'])) { ?>
			<li><p class="navbar-text"><strong>Welcome!</strong> You're signed in as <strong><?php echo $_SESSION['name']; ?></strong></p></li>
			<br>
			<li><a href="upload_image.php"><strong>Upload Images in Gallery</strong></a></li>
			<li><a href="logout.php">Log Out</a></li>
			<?php } else { ?>
			<li><p class="navbar-text">You are Logged Out!</p></li><br>
			<li><a href="index.php">Login</a></li>				
			<?php } ?>
		</ul>
	</div>	
	</div>
	<?php if (isset($_SESSION['userid'])) { ?>
		<div class="row">
			<div class="navbar-collapse gallery">			
				<ul>
				<?php			
					$sql_query="SELECT id, user_id, image_title, image_description, image_name FROM gallery WHERE user_id='".$_SESSION["userid"]."'";
					$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
					while($rows = mysqli_fetch_array($resultset) ) { ?>
					<li>					
						<a href="http://localhost/coderszine/build-image-gallery-with-jquery-php-mysql/uploads/<?php echo $rows["image_name"]; ?>" data-lightbox="<?php echo $_SESSION['userid']; ?>" data-title="<?php echo $rows["image_title"]; ?>"><img
				src="http://localhost/coderszine/build-image-gallery-with-jquery-php-mysql/uploads/<?php echo $rows["image_name"]; ?>" class="images" width="200" height="200"></a>
					</li>
					<?php } ?>
				</ul>			
			</div>
		</div>
	<?php } ?>
	
	<div style="margin:50px 0px 0px 0px;">
		<a class="btn btn-default read-more" style="background:#3399ff;color:white" href="http://www.coderszine.com/build-image-gallery-with-jquery-php-mysql/">Back to Tutorial</a>		
	</div>
</div>
<?php include('footer.php');?>
