<?php 
 	require_once 'check_admin.php';
 	$message = "";
 	if (isset($_POST['submit'])) {
 		require_once '../connections/connection.php';

 		$query = "SELECT * FROM wwa";
	 	$result = mysqli_query($con, $query);
	 	$record = mysqli_fetch_array($result);
	 	$row_count = mysqli_num_rows($result);

	 	if($row_count > 0) {
	 		$content = $_POST['content'];
	 		$content = str_replace("'", "\'", $content);
	 		$query = "UPDATE wwa SET content= '$content' WHERE wwa_id = 1";
	 		if($result = mysqli_query($con, $query)) {
	 			header("change-wwa.php");
	 			$message = "Updated";
	 		}
	 		else {
	 			$message = "Error Occured";
	 			echo mysqli_error($con);
	 		}
	 	}
	 	else {
	 		$content = $_POST['content'];
	 		$content = str_replace("'", "\'", $content);
	 		$query = "INSERT INTO wwa VALUES ('', '{$content}')";
	 		if($result = mysqli_query($con, $query)) {
	 			header("change-wwa.php");
	 			$message = "Entered";
	 		}
	 		else {
	 			$message = "Error Occured";
	 			echo mysqli_error($con);
	 		}
	 	}
 	}


 	if(isset($_POST['hksubmit'])) {
 		require_once '../connections/connection.php';
		$valid_types = array('jpeg','jpg','JPG','JPEG','png','PNG');
		$image = $_FILES['hkimage']['name'];
		if($image != "") {
			list($filename,$extension) = explode('.', $image);
		}
		$size = $_FILES['hkimage']['size'];
		$type = $_FILES['hkimage']['type'];
		$tmp = $_FILES['hkimage']['tmp_name'];
		if($size < 50 * 1024 * 1024) {
			if($image != "") {
				if(in_array($extension, $valid_types)) {
					$target = '../gallery/images/'.$image;
					if(move_uploaded_file($tmp, $target)) {
						$query = "SELECT * FROM wwa";
					 	$result = mysqli_query($con, $query);
					 	$record = mysqli_fetch_array($result);
					 	$row_count = mysqli_num_rows($result);
						if($row_count > 0) {
					 		$content = $_POST['hkcontent'];
					 		$content = str_replace("'", "\'", $content);
					 		$query = "UPDATE wwa SET ceo= '$content', img='$image' WHERE wwa_id = 1";
					 		if($result = mysqli_query($con, $query)) {
					 			header("change-wwa.php");
					 			$message = "Updated";
					 		}
					 		else {
					 			$message = "Error Occured";
					 			echo mysqli_error($con);
					 		}
					 	}
					 	else {
					 		$content = $_POST['hkcontent'];
					 		$content = str_replace("'", "\'", $content);
					 		$query = "INSERT INTO wwa VALUES ('', '', '{$content}', '$image')";
					 		if($result = mysqli_query($con, $query)) {
					 			header("change-wwa.php");
					 			$message = "Entered";
					 		}
					 		else {
					 			$message = "Error Occured";
					 			echo mysqli_error($con);
					 		}
					 	}
					}
				}
				else {
					$message = "Invalid image format.";
				}
			}
			else {
				$query = "SELECT * FROM wwa";
			 	$result = mysqli_query($con, $query);
			 	$record = mysqli_fetch_array($result);
			 	$row_count = mysqli_num_rows($result);

			 	if($row_count > 0) {
			 		$content = $_POST['hkcontent'];
			 		$content = str_replace("'", "\'", $content);
			 		$query = "UPDATE wwa SET ceo= '$content' WHERE wwa_id = 1";
			 		if($result = mysqli_query($con, $query)) {
			 			header("change-wwa.php");
			 			$message = "Updated";
			 		}
			 		else {
			 			$message = "Error Occured";
			 			echo mysqli_error($con);
			 		}
			 	}
			 	else {
			 		$content = $_POST['hkcontent'];
			 		$content = str_replace("'", "\'", $content);
			 		$query = "INSERT INTO wwa VALUES ('','', '{$content}')";
			 		if($result = mysqli_query($con, $query)) {
			 			header("change-wwa.php");
			 			$message = "Entered";
			 		}
			 		else {
			 			$message = "Error Occured";
			 			echo mysqli_error($con);
			 		}
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
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Consultancy: Write Article</title>
	<!-- <link rel="stylesheet" type="text/css" href="css/jquery-text.css"> -->
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js" charset="utf-8"></script>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	
	<script src="../js/ckeditor/ckeditor.js"></script>
	<script>

		// This code is generally not necessary, but it is here to demonstrate
		// how to customize specific editor instances on the fly. This fits well
		// this demo because we have editable elements (like headers) that
		// require less features.

		// The "instanceCreated" event is fired for every editor instance created.
		CKEDITOR.on( 'instanceCreated', function( event ) {
			var editor = event.editor,
				element = editor.element;

			// Customize editors for headers and tag list.
			// These editors don't need features like smileys, templates, iframes etc.
			if ( element.is( 'h1', 'h2', 'h3' ) || element.getAttribute( 'id' ) == 'taglist' ) {
				// Customize the editor configurations on "configLoaded" event,
				// which is fired after the configuration file loading and
				// execution. This makes it possible to change the
				// configurations before the editor initialization takes place.
				editor.on( 'configLoaded', function() {

					// Remove unnecessary plugins to make the editor simpler.
					editor.config.removePlugins = 'colorbutton,find,flash,font,' +
						'forms,iframe,image,newpage,removeformat,' +
						'smiley,specialchar,stylescombo,templates';

					// Rearrange the layout of the toolbar.
					editor.config.toolbarGroups = [
						{ name: 'editing',		groups: [ 'basicstyles', 'links' ] },
						{ name: 'undo' },
						{ name: 'clipboard',	groups: [ 'selection', 'clipboard' ] },
						{ name: 'about' }
					];
				});
			}
		});

	</script>
</head>
<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1 class="text-center">Change "Who we are" Content</h1>
				<h3>
					<?php echo $message ?>
				</h3>
				<form class="form" method="post" action="change-wwa.php" name="change-wwa">
					<div class="form-group">
						<label for="content">Write Here</label>
						<textarea rows="10" class="form-control" name="content" id="content"></textarea>
						<script type="text/javascript">
						CKEDITOR.replace( 'content' );
						</script>
						<!-- <textarea contenteditable="true" rows="10" class="form-control" name="content"></textarea> -->
					</div>
					<div class="form-group">
						<input type="submit" value="Submit" name="submit">
					</div>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1 class="text-center">CEO Section</h1>
				<h3>
					<?php echo $message ?>
				</h3>
				<form class="form" method="post" action="change-wwa.php" name="change-hk" enctype="multipart/form-data">
					<div class="form-group">
						<label for="hkimage">Select Image</label>
						<input type="file" id="hkimage" name="hkimage" placeholder="Browse for an image.">
					</div>
					<div class="form-group">
						<label for="hkcontent">Write Here</label>
						<textarea rows="10" class="form-control" name="hkcontent" id="hkcontent"></textarea>
						<script type="text/javascript">
						CKEDITOR.replace( 'hkcontent' );
						</script>
						<!-- <textarea contenteditable="true" rows="10" class="form-control" name="content"></textarea> -->
					</div>
					<div class="form-group">
						<input type="submit" value="hkSubmit" name="hksubmit">
					</div>
				</form>
			</div>
		</div>
		
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<!--<script type="text/javascript" src="js/jquery-te-1.4.0.min.js" charset="utf-8"></script> 

	<script>
		$('.jqte-text').jqte();
		
		// settings of status
		var jqteStatus = true;
	</script>
	-->
	
</body>
</html>