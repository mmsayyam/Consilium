<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
	<title>Consultancy</title>
    <link rel="stylesheet" type="text/css" href="css/slider.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/video.css">
</head>
<body>
    <?php require_once('includes/header.php') ?>
	<?php require_once('slider/file/slider.html') ?>
    <div class="video-slider"><?php require_once 'includes/video.php'; ?></div>
    <?php require_once('includes/footer.php') ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	
    
	<script> 
	    $('.carousel').carousel({
	        interval: 5000 //changes the speed
	    }) 
    </script>
    <script type="text/javascript" src="js/slider-data.js"></script>
    <script type="text/javascript" src="slider/js/jssor.js"></script>
    <script type="text/javascript" src="slider/js/jssor.slider.js"></script>
    <script type="text/javascript" src="js/video-slider-data.js"></script>

    <script>
        jQuery(document).ready(function ($) {
            var videoOptions = {
                $AutoPlay: false,

                $PauseOnHover: true,                               //[Optional] Whether to pause when mouse over if a slideshow is auto playing, default value is false

                $ArrowKeyNavigation: true,                          //Allows arrow key to navigate or not
                $SlideWidth: 500,                                   //[Optional] Width of every slide in pixels, the default is width of 'slides' container
                //$SlideHeight: 300,                                  //[Optional] Height of every slide in pixels, the default is width of 'slides' container
                $SlideSpacing: 40,                                  //Space between each slide in pixels
                $DisplayPieces: 3,                                  //Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 5,                                //The offset position to park slide (this options applys only when slideshow disabled).

                $ArrowNavigatorOptions: {                       //[Optional] Options to specify and enable arrow navigator or not
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
                }
            };

            var video_slider_jssor = new $JssorSlider$("video-slider", videoOptions);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function VideoScale() {
                var parentWidth = video_slider_jssor.$Elmt.parentNode.clientWidth;
                if (parentWidth)
                    video_slider_jssor.$ScaleWidth(Math.min(parentWidth, 1300));
                else
                    window.setTimeout(VideoScale, 30);
            }

            VideoScale();

            if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
                $(window).bind('resize', VideoScale);
            }


            //if (navigator.userAgent.match(/(iPhone|iPod|iPad)/)) {
            //    $(window).bind("orientationchange", ScaleSlider);
            //}
            //responsive code end
        });
    </script>
    
</body>
</html>