<?php 
require_once 'connections/connection.php';
require_once 'includes/curPageScript.php';

$query = "SELECT * FROM wwd";
$result = mysqli_query($con, $query);
$record = mysqli_fetch_array($result);

$acc_query = "SELECT * FROM wwd_accordion";
$acc_result = mysqli_query($con, $acc_query);
$acc_record = mysqli_fetch_array($acc_result);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link rel="shortcut icon" href="img/Consilium.svg">
  <title>Consilium - What We Do</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/header.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/second-pages.css">

</head>
<body class="what-we-do-body">
	<?php require_once('includes/header.php') ?>
	<div class="container">
    <?php
    if (isset($_SESSION['username']) && $_SESSION['access'] === "admin") {
      ?>
      <div id="edit-page" class="pull-right">
        <a href="redirect-to.php?redirect-to=<?php echo curPageName(); ?>">Edit Page</a> | <a href="admin/index.php">Admin Panel</a>
      </div>

      <?php
    }
    ?>
    <h1>What We Do</h1>
    <?php echo $record['content'] ?>
    <?php if(mysqli_num_rows($acc_result) > 0){ ?>
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
      <?php $i = 0; do{$i++ ?>
      <div class="panel panel-default">
        <div class="panel-heading <?php if($i === 1) {echo "panel-heading-opened";} ?>" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i ?>" aria-controls="collapse<?php echo $i ?>">
          <h4 class="panel-title">
            <a >
              <?php echo $acc_record['dc_heading']; ?>
            </a>
          </h4>
        </div>
        <div id="collapse<?php echo $i ?>" class='panel-collapse collapse <?php if($i === 1) {echo "in";} ?>' role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body">
           <?php echo $acc_record['dc_content']; ?>
         </div>
       </div>
     </div>
     <?php }while($acc_record = mysqli_fetch_array($acc_result)) ?>
   </div>
   <?php } ?>
 </div>

 <div style="font-size: 22px; margin-bottom: 1.5em" class="text-center"><a class="more-link text-center" href="features-videos.php">Watch our videos <img src="img/arrow_right.svg" style="height: 25px; width:auto;"/></a></div>
</div>
<?php require_once 'includes/footer.php'; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript">
 $('.panel-heading').click(function() {
  $(this).toggleClass('panel-heading-opened');
  $('.panel-heading').not(this).removeClass('panel-heading-opened');
})
</script>
</body> 
</html>