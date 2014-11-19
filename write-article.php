<?php 
 	if(!isset($_SESSION)) {
 		session_start();
 	}
 	if (!isset($_SESSION['username']) || $_SESSION['access'] != "admin") {
 		header("Location: member-login.php");
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
	<link rel="stylesheet" type="text/css" href="css/jquery-te-1.4.0.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	
</head>
<body>
	<?php require_once('includes/header.php') ?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1 class="text-center">Write an Article</h1>
				<form class="form" method="post" action="write-article.php" name="insert_article">
					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" class="form-control" id="title" placeholder="Enter Title">
					</div>
					<div class="form-group">
						<label for="content">Title</label>
						<?php require_once 'includes/editor-toolbar.html'; ?>
						<div class="editor"></div>
					</div>
					<div class="form-group">
						<input type="submit" value="Submit" name="submit">
					</div>
				</form>
			</div>
		</div>
		
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<!--<script type="text/javascript" src="js/jquery-te-1.4.0.min.js" charset="utf-8"></script> 

	<script>
		$('.jqte-text').jqte();
		
		// settings of status
		var jqteStatus = true;
	</script>
	-->
	<script type="text/javascript" src="js/bootstrap-wysiwyg.js"></script>
	<script type="text/javascript">
		$('.editor').wysiwyg();
	</script>
</body>
</html>