	<?php 
		require_once 'connections/connection.php';

		$query = "SELECT * FROM gallery WHERE g_type = 'video' ORDER BY g_id DESC LIMIT 5";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
	?>

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
    
    <div class="video-slider">
		<span class="left"><img src="img/Arrow_Right_Filled.svg"></span>
		<span style="float:right" class="right"><img src="img/Arrow_Right_Filled.svg"></span>
    		
		<ul class="videos">
			
			<?php do { ?>
				<li>
					<div class="embed-responsive embed-responsive-4by3 video-cont">
						<video class="embed-responsive-item" disabled>
							<source src="gallery/videos/<?php echo $row['g_video'] ?>">
							<input type="hidden" value="<?php echo $row['g_content'] ?>" id="content">
							<input type="hidden" value="<?php echo $row['g_title'] ?>" id="title">
						</video>
						<div class="overlay"><img src="img/video_play_icon.svg"></div>
					</div>
				</li>
			<?php } while($row = mysqli_fetch_array($result)) ?>	
		</ul>
		<div class="heading">
	        <h1 class="text-center"><a href="features-videos.php">More Videos <img style="height: 25px; width:auto;" src="img/arrow_right.svg"></a></h1>
	    </div>
	</div>