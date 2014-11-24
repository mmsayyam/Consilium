<?php
		$con = mysqli_connect('LocalHost', 'root', '', 'consultancy');
		$results = $con->query("SELECT COUNT(*) as t_records FROM gallery");
		$total_records = $results->fetch_object();
		$items_per_group = 8;
		$total_groups = ceil($total_records->t_records/$items_per_group);
		$results->close();
	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
	<title>Consilium - Features & Videos</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link href='http://fonts.googleapis.com/css?family=Raleway:300|Quicksand' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/second-pages.css">
	<link href="gallery/css/least.min.css" rel="stylesheet" />
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	
	
	<script type="text/javascript">
    	/*$(document).ready(function() {
		    var track_load = 0; //total loaded record group(s)
		    var loading  = false; //to prevents multipal ajax loads
		    var total_groups = <?php echo $total_groups; ?>; //total record group(s)
		   
		    $('#least-gallery').load("autoload_process.php", {'group_no':track_load}, function() {track_load++; $('.least-gallery').least();}); //load first group
		   	
		    $(window).scroll(function() { //detect page scroll
		       
		        if($(window).scrollTop() + $(window).height() == $(document).height())  //user scrolled to bottom of the page?
		        {
		           
		            if(track_load <= total_groups && loading==false) //there's more data to load
		            {
		                loading = true; //prevent further ajax loading
		                $('.animation_image').show(); //show loading image
		               
		                //load data from the server using a HTTP POST request
		                $.post('autoload_process.php',{'group_no': track_load}, function(data){
		                                   
		                    $("#least-gallery").append(data); //append received data into the element
		                    $('.least-gallery').least();
		                    //hide loading image
		                    $('.animation_image').hide(); //hide loading image once data is received
		                   
		                    track_load++; //loaded group increment
		                    loading = false;
		               
		                }).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
		                   
		                    alert(thrownError); //alert with HTTP error
		                    $('.animation_image').hide(); //hide loading image
		                    loading = false;
		                });
		               
		            }else {
		            	$('.no-more').show();
		            }
		        }
		    });
		});*/
    </script>
</head>
<body class="features-body">

	<?php require_once 'includes/header.php'; ?>

	<div class="container">
		<h1 class="text-center">Features & Videos</h1>
		<div class="main">

			<section id="least">
				<div class="least-preview"></div>
				<ul id="least-gallery" class="least-gallery">
				</ul>

				<div class="animation_image" style="display:none" align="center">
					<img src="img/ajax-loader.gif">
				</div>
				<div class="no-more" style="display:none">
					<h3 class="text-center">No more content to load.</h3>
				</div>
			</section>
			
			
		</div>
	</div>
	<script src="gallery/js/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="gallery/js/libs/least/least.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script>
            /* Google Analytics */
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-16040332-11', 'leastjs.com');
            ga('set', 'anonymizeIp', true);
            ga('send', 'pageview');
        </script>
</body>
</html>