<?php require_once 'connections/connection.php'; ?>
<?php
		$query = "SELECT COUNT(*) FROM gallery";
		$results = mysqli_query($con, $query);
		$get_total_rows = mysqli_fetch_array($results);
		$items_per_group = 8;
		$total_pages = ceil($get_total_rows[0]/$items_per_group);

	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="img/Consilium.svg">
	<title>Consilium - Features & Videos</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link href='http://fonts.googleapis.com/css?family=Raleway:300|Quicksand' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/second-pages.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="gallery/js/libs/jquery/2.0.2/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" href="css/features-videos.css">
	<script type="text/javascript">
    	$(document).ready(function() {
		    var track_click = 0; //total loaded record group(s)

		    var total_pages = <?php echo $total_pages; ?>

		    $('#gallery').load("includes/autoload_process.php", {'group_no':track_click}, function() {track_click++;}); //load first group

		    $('.load_more').click(function (e) {

		        $(this).hide();
		        $('.animation_image').show(); //show loading image

		            if(track_click <= total_pages) //there's more data to load
		            {
		                //load data from the server using a HTTP POST request
		                $.post('includes/autoload_process.php',{'group_no': track_click}, function(data){

		                    $('.load_more').show();
		                    $('.animation_image').hide(); //hide loading image once data is received
		                    $("#gallery").append(data); //append received data into the element
		                    //hide loading image

		                    track_click++; //loaded group increment

		                }).fail(function(xhr, ajaxOptions, thrownError) { //any errors?

		                    alert(thrownError); //alert with HTTP error
		                    $('.load_more').show();
		                    $('.animation_image').hide(); //hide loading image
		                });

		            }
		            else{
		                	$('.load_more').attr('disabled', 'disabled');
		                	$('.animation_image').hide();
		                	$('.no-more').show();
		            }
		        });
		});
    </script>
</head>
<body class="features-body">

	<?php require_once 'includes/header.php'; ?>

	<div class="container">
		<h1 class="text-center">Features & Videos</h1>
		<div class="main">
			<div class="modal fade" id="myModal" tabindex="99999" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		      	<div class="modal-dialog">
			        <div class="modal-content">
					    <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				    	</div>
			          	<div class="modal-body">
			          	</div>
			        </div><!-- /.modal-content -->
		    	</div><!-- /.modal-dialog -->
		    </div><!-- /.modal -->

			<ul id="gallery" class="gallery row">
			</ul>

			<div class="animation_image" style="display:none" align="center">
				<img src="img/ajax-loader.gif">
			</div>
			<button class="load_more btn btn-load-more" >Load More</button>
			<div class="no-more text-center" style="display:none">
				<h3>No more content to load.</h3>
			</div>

		</div>
	</div>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
