<?php 
	if(!isset($_SESSION)) {
		session_start();
	}
	if (!isset($_SESSION['username']) || $_SESSION['access'] != "user") {
 		header("Location: member-login.php");
 	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/Consilium.svg">
	<title>User Panel</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<?php require_once('includes/header.php') ?>

	<div class="container-fluid">
		User Panel
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>