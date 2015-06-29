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
  <link rel="shortcut icon" href="assets/img/Consilium.svg">
  <title>Consilium - What We Do</title>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/custom.css">

</head>
<body class="what-we-do-body">
  <?php require_once('includes/header.html') ?>
  
  <div class="banner">
    <div class="banner-word">"We aim to develop the leaders of today to change the world tomorrow."</div>
  </div>
  <div class="container">
  
      <div class="heading-container">
        <h2>What We Do</h2>
        <div style="position: relative"><hr class="fancy-line"></div>
      </div>
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
         <?php $i = 0; do{$i++ ?>
            <div class="panel panel-default">
               <div class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i ?>" aria-controls="collapse<?php echo $i ?>">
                  <h4 class="panel-title">
                     <a >
                        <?php echo $acc_record['oc_heading']; ?>
                     </a>
                  </h4>
               </div>
               <div id="collapse<?php echo $i ?>" class="panel-collapse collapse <?php if($i==1) {echo "in";} ?>" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body" align="center">
                    <div class="panel-image"><img class="img-responsive" src="assets/img/slider-images/image1.png" alt=""></div>
                     <div class="panel-content"><?php echo $acc_record['oc_content']; ?></div>
                  </div>
               </div>
            </div>
            <?php }while($acc_record = mysqli_fetch_array($acc_result)) ?>
         </div>
         <a href="features-videos.php">
           <button class="btn btn-consilium-pointy">Watch Our Videos</button>
         </a>
      </div>
      
    </div>
  
  </div>
  <?php require_once 'includes/footer.html'; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body> 
</html>