<?php 
 	$con = mysqli_connect('LocalHost', 'root', '', 'consultancy');

 	$query = "SELECT * FROM wwd";
 	$result = mysqli_query($con, $query);
 	$record = mysqli_fetch_array($result);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
	<title>Consilium - What We Do</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/second-pages.css">

</head>
<body class="what-we-do-body">
	<?php require_once('includes/header.php') ?>
	<div class="container">
		<img class="wwd-img img-responsive" src="img/what-we-do.jpg">
		<h1>What We Do</h1>
		<?php echo $record['content'] ?>

		<p class="text-center"><a class="more-link" href="#">Watch our videos <img src="img/arrow_right.svg" style="height: 25px; width:auto;"/></a></p>
	</div>
	<?php require_once 'includes/footer.php'; ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>