<?php 
 	if(!isset($_SESSION)) {
 		session_start();
 	}
 	if (!isset($_SESSION['username']) || $_SESSION['access'] != "admin") {
 		header("Location: ../member-login.php");
 	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Management Consultancy</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>

	<div class="container-fluid">
		<h3 class="text-center">
			<a href="admin-users.php">Users</a>
		</h3>
		<h3 class="text-center">
			<a href="write-article.php">Articles</a>
		</h3>
		<h3 class="text-center">
			Gallery
		</h3>
		<h3 class="text-center">
			<a href="change-wwd.php">Change Content of "What We Do"</a>
		</h3>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>