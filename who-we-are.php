<?php 
 	require_once 'connections/connection.php';

 	$query = "SELECT * FROM wwa";
 	$result = mysqli_query($con, $query);
 	$record = mysqli_fetch_array($result);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
	<title>Consilium - Who we are</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/second-pages.css">

</head>
<body class="wwa-body">
	<?php require_once('includes/header.php') ?>
	<div class="container">
		<h1>Who We Are</h1>
		<?php echo $record['content'] ?>
		<div>
		<img class="img-responsive" src="gallery/images/<?php echo $record['img'] ?>" style="float:right; width: 340px; height: auto; margin-top: 4px; margin-bottom: 14px; margin-left: 16px">
		<?php echo $record['ceo'] ?>	
		</div>
		

	</div>
	<?php require_once 'includes/footer.php'; ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>