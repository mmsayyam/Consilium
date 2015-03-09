<?php 
 	require_once 'connections/connection.php';

 	$query = "SELECT * FROM wwb";
 	$result = mysqli_query($con, $query);
 	$record = mysqli_fetch_array($result);

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="img/Consilium.svg">
	<title>Consilium - Who will benefit</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/second-pages.css">
    <link rel="stylesheet" type="text/css" href="css/offering.css">

</head>
<body class="wwb-body">
	<?php require_once('includes/header.php') ?>
	<div class="container">
		<h1>Who will benefit</h1>
		<?php echo $record['content'] ?>
	</div>
	<?php require_once 'includes/footer.php'; ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>