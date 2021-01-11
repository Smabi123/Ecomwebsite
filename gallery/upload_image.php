<?php 
include('header.php');
include_once("db_connect.php");
session_start();
$error = '';
if(isset($_POST["upload_image"]) && $_SESSION["userid"]) {
	$title=$_POST["title"];
	$description=$_POST["description"];
	$fk_uid=$_SESSION["userid"];
	$image=$_FILES["image"]["name"];
	if ($_FILES["image"]["type"]=="image/gif"
	|| $_FILES["image"]["type"]=="image/jpeg"
	|| $_FILES["image"]["type"]=="image/pjpeg"
	|| $_FILES["image"]["type"]=="image/png"
	&& $_FILES["image"]["size"]<20000) {
		if ($_FILES["image"]["error"]>0)	{
			echo "Return Code:".$_FILES["image"]["error"]."<br />";
		} else {
			$i=1;
			$success = false;
			$new_image_name=$image;
			while(!$success) {
				if (file_exists("uploads/".$new_image_name)) {
					$i++;
					$new_image_name="$i".$image;
				} else {
					$success=true;
				}
			}
			move_uploaded_file($_FILES["uploaded_file"]["tmp_name"],"uploads/".$new_image_name);				
			$insert_sql = "INSERT INTO gallery(id,user_id, image_title, image_description, image_name) 
				VALUES('', '". $_SESSION["userid"]."', '".$title."', '".$description."', '".$image_name."')";
			mysqli_query($conn, $insert_sql) or die("database error: ". mysqli_error($conn));					
		}
	} else {
		$error = "Please upload valid image file";
	}  
}
?>
<title></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<?php include('container.php');?>
<div class="container">	
	<h2></h2>	
	<br><br>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">			
			<?php if(isset($_SESSION["userid"])) {	?>				
			<strong><a href="gallery.php">View Gallery</a> </strong>
			<a href="logout.php">Logout</a>		<br><br>
			<form role="form" enctype='multipart/form-data' action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<fieldset>
					<legend>Upload Images</legend>				
					<?php if ($error) { ?>						
					<div class="alert alert-danger">
					  <?php echo $error; ?>
					</div>				
					<?php } ?>		
					<div class="form-group">
						<label for="name">Title</label>
						<input type="text" name="title" placeholder="Image Title" class="form-control" />
					</div>	
					<div class="form-group">
						<label for="name">Description:</label>
						<input type="text" name="description" placeholder="Image Description" class="form-control" />
					</div>	
					<div class="form-group">
						<label for="name">Choose Image:</label>
						<input type="file" name="image" placeholder="Choose file" class="form-control" />
					</div>	
					<div class="form-group">
						<input type="submit" name="upload_image" value="upload" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>			
		</div>
	</div>	
	<?php } else { ?>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-left">		
				<br>			
				<li><p class="navbar-text">You are Logged Out!</p></li>	
				<br>			
				<li><a href="index.php">Login</a></li>			
			</ul>
		</div>	
	<?php }	?>
	<br>
	<div style="margin:50px 0px 0px 0px;">
		<a class="btn btn-default read-more" style="background:#3399ff;color:white" href="http://www.coderszine.com/build-image-gallery-with-jquery-php-mysql">Back to Tutorial</a>	
	</div>
</div>
<?php include('footer.php');?>
