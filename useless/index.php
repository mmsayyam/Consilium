<?php 
	if(!isset($_SESSION)) {
		session_start();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Management Consultancy</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="css/slider.css" rel="stylesheet">
</head>
<body>
	<?php require_once('includes/header.php') ?>
	<?php require_once('slider/file/slider.html') ?>
	<div class="container-fluid">
		
	</div>

	<script type="text/javascript" src="js/bootstrap.min.js"></script>

	<script src="js/jquery-1.11.0.js"></script>
    <script type="text/javascript" src="slider/js/jssor.js"></script>
    <script type="text/javascript" src="slider/js/jssor.slider.js"></script>

    <script type="text/javascript" src="js/slider-data.js"></script>
</body>
</html>