<?php
 	require_once 'connections/connection.php';

 	$query = "SELECT * FROM offering";
 	$result = mysqli_query($con, $query);
 	$record = mysqli_fetch_array($result);

 	$acc_query = "SELECT * FROM offering_accordion";
 	$acc_result = mysqli_query($con, $acc_query);
 	$acc_record = mysqli_fetch_array($acc_result);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="img/Consilium.svg">
	<title>Consilium - Our Offerings</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/second-pages.css">
    <link rel="stylesheet" type="text/css" href="css/offering.css">

</head>
<body class="offering-body">
	<?php require_once('includes/header.php') ?>
	<div class="container">
		<h1>Our Offerings</h1>
		<?php echo $record['content'] ?>

		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<?php $i = 0; do{$i++ ?>
			<div class="panel panel-default">
		    	<div class="panel-heading" role="tab" id="headingOne">
		      		<h4 class="panel-title">
		        		<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i ?>" aria-controls="collapse<?php echo $i ?>">
		          			<?php echo $acc_record['oc_heading']; ?>
		        		</a>
		      		</h4>
		    	</div>
			    <div id="collapse<?php echo $i ?>" class="panel-collapse collapse<?php if($i==1){ ?> in <?php } ?> " role="tabpanel" aria-labelledby="headingOne">
			      	<div class="panel-body">
			        	<?php echo $acc_record['oc_content']; ?>
			      	</div>
			    </div>
		  	</div>
		  	<?php }while($acc_record = mysqli_fetch_array($acc_result)) ?>
		</div>
	</div>
	<?php require_once 'includes/footer.php'; ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
