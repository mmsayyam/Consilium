<?php require_once 'check_admin.php'; ?>
<?php require_once '../connections/connection.php'; ?>
<?php
	$message="";
	$date="";
	if(isset($_POST['totem-this'])) {

		$valid_types = array('mp4','flv','MP4','FLV');
		$video = $_FILES['video']['name'];
		if($video != "") {
			list($filename,$extension) = explode('.', $video);
		}
		$size = $_FILES['video']['size'];
		$type = $_FILES['video']['type'];
		$tmp = $_FILES['video']['tmp_name'];
		$g_type = "video";
		if($size < (50 * 1024 * 1024)) {
			if($video != "") {
				if(in_array($extension, $valid_types)) {
					$target = '../gallery/videos/'.$video;
					if(move_uploaded_file($tmp, $target)) {
						$title = $_POST['title'];
						$content = $_POST['description'];
						$date = date('d-m-Y');
						$author = $_SESSION['username'];
						$query = "INSERT INTO gallery VALUES ('', '$title', '$content', '', '', '$date', '$author', '$video', '$g_type');";
						if($result = mysqli_query($con, $query)) {
							header('Location: ../features-videos.php');
							$message = "Video Uploaded";
						}
						else {
							$message = "Error Occured";
							echo mysqli_error($con);
						}
					}
				}
				else {
					$message = "Invalid video format.";
				}
			}
		}
		else {
			$message = "Video size is too large. Max limit is 50MB";
		}
	}
	if(isset($_POST['totem-that'])) {
		$valid_types = array('jpeg','jpg','JPG','JPEG','png','PNG');
		$image = $_FILES['image']['name'];
		if($image != "") {
			list($filename,$extension) = explode('.', $image);
		}
		$size = $_FILES['image']['size'];
		$type = $_FILES['image']['type'];
		$tmp = $_FILES['image']['tmp_name'];
		$g_type = "article";
		if($size < 50 * 1024 * 1024) {
			if($image != "") {
				if(in_array($extension, $valid_types)) {
					$target = '../gallery/images/'.$image;
					if(move_uploaded_file($tmp, $target)) {
						$title = $_POST['title'];
						$content = $_POST['content'];
						$date = date('d-m-Y');
						$author = $_SESSION['username'];
						$query = "INSERT INTO gallery VALUES ('', '$title', '$content', '$image', '$image', '$date', '$author', '', '$g_type');";
						if($result = mysqli_query($con, $query)) {
							header('Location: ../features-videos.php');
							$message = "Image Uploaded";
						}
						else {
							$message = "Error Occured";
							echo mysqli_error($con);
						}
					}
				}
				else {
					$message = "Invalid image format.";
				}
			}
		}
		else {
			$message = "Image size is too large. Max limit is 5MB";
		}
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
	<title>Admin - Insert Stuff</title>
    <link rel="stylesheet" href="../assets/css/custom.min.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
	<?php require_once('admin-header.html') ?>
	<script src="../assets/js/ckeditor/ckeditor.js"></script>

	<div class="container">

	<script type="text/javascript">
	</script>
		<form class="form-horizontal">
			<div class="form-group">
		    	<label for="choice" class="col-sm-2 control-label">Type of Entry</label>
		    	<div class="col-sm-3 radio col-sm-offset-2">
		    		<label>
			      		<input type="radio" id="video" name="choice" value="video">
			      		Video<br/>
		      		</label>
		    	</div>
		    	<div class="col-sm-3 radio">
		    		<label>
		    			<input type="radio" id="article" name="choice" value="article">
			      		Article
		    		</label>
		    	</div>
		  	</div>
		</form>
		<form class="form-horizontal" role="form" enctype="multipart/form-data" action="insert-gallery.php" method="post" name="form-video" id="form-video">

		  	<div class="video" style="display:none">
		  		<div class="form-group">
			    	<label for="title" class="col-sm-2 control-label">Title</label>
			    	<div class="col-sm-10">
			      		<input type="text" class="form-control" id="title" name="title" placeholder="Enter title of the video.">
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="description" class="col-sm-2 control-label">Description</label>
			    	<div class="col-sm-10">
			    		<textarea class="form-control" id="description" name="description"></textarea>
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="video" class="col-sm-2 control-label">Browse File</label>
			    	<div class="col-sm-10">
			      		<input type="file" id="video" name="video" placeholder="Browse for the file.">
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<div class="col-sm-offset-2 col-sm-10">
			    		<button type="submit" class="btn btn-default">Submit</button>
			    		<input type="hidden" value="video" name="totem-this">
			    	</div>
				</div>
		  	</div>
		</form>
		<form class="form-horizontal" role="form" enctype="multipart/form-data" action="insert-gallery.php" method="post" name="form-article" id="form-article">
			<div class="article" style="display: none">
		  		<div class="form-group">
			    	<label for="title" class="col-sm-2 control-label">Title</label>
			    	<div class="col-sm-10">
			      		<input type="text" class="form-control" id="title" name="title" placeholder="Enter title of the video.">
			    	</div>
			  	</div>
			  	<div class="form-group">
					<label for="content" class="col-sm-2 control-label">Write Here</label>
					<div class="col-sm-10">
						<textarea rows="10" class="form-control ckeditor" name="content" id="content"></textarea>
					</div>

				</div>
				<div class="form-group">
			    	<label for="file" class="col-sm-2 control-label">Browse File</label>
			    	<div class="col-sm-10">
			      		<input type="file" id="image" name="image" placeholder="Browse for the image.">
			    	</div>
			  	</div>
				<div class="form-group">
			    	<div class="col-sm-offset-2 col-sm-10">
			    		<button type="submit" class="btn btn-default">Submit</button>
			    		<input type="hidden" value="article" name="totem-that">
			    	</div>
				</div>
		  	</div>
		</form>
	</div>
	<script type="text/javascript">
	$('#video').click(function() {
		$('.video').show();
		$('.article').hide();
	});
	$('#article').click(function() {
		$('.video').hide();
		$('.article').show();
	});
	</script>
</body>
</html>
