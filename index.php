<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
	<title>Consilium</title>
    <link rel="shortcut icon" href="img/Consilium.svg">
    <link rel="stylesheet" type="text/css" href="css/slider.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/video.css">
    <link rel="stylesheet" type="text/css" href="css/main-slider.css">
    <link rel="stylesheet" type="text/css" href="css/video-carousel.css">
</head>
<body>
    <?php require_once('includes/header.php') ?>

	<div><?php require_once('includes/slider.php') ?></div>
	<?php require_once('includes/video-carousel.php') ?>
    <div class="video-slider"><?php require_once 'includes/video.php'; ?></div>
    <div class="heading">
        <h1 class="text-center" style="font-size: 24px;"><a href="features-videos.php">More Videos <img style="height: 18px; width:auto;" src="img/arrow_right.svg"></a></h1>
    </div>

    <?php require_once('includes/footer.php') ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/slider-data.js"></script>
    
</body>
</html>