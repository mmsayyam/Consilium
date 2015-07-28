<?php session_start() ?>
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
   <title>Consilium - Our Offerings</title>
   <!-- <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/css/custom.css">
   
   <link rel="stylesheet" type="text/css" href="css/footer.css">
   <link rel="stylesheet" type="text/css" href="css/main.css">
   <link rel="stylesheet" type="text/css" href="css/second-pages.css">
   <link rel="stylesheet" type="text/css" href="css/offering.css"> -->
   <link rel="stylesheet" href="./assets/font-awesome/css/font-awesome.min.css" />
   <link rel="stylesheet" href="./assets/css/custom.min.css" />

</head>
<body class="offering-body">
   <?php require_once('includes/header.html') ?>
   <div class="c-container">
      <?php
      require_once 'includes/curPageScript.php';
      if (isset($_SESSION['username']) && $_SESSION['access'] === "admin") {
         ?>
         <div id="edit-page" class="pull-right">
            <a href="redirect-to.php?redirect-to=<?php echo curPageName(); ?>">Edit Page</a> | <a href="admin/index.php">Admin Panel</a>
         </div>
         
         <?php
      }
      ?>
      <div class="banner">
            <div class="banner-word">"We aim to develop the leaders of today to change the world tomorrow."</div>
      </div>
      <div class="container">
         <div class="heading-container">
               <h2>Our Offerings</h2>
               <div style="position: relative"><hr class="fancy-line"></div>
         </div>
         <?php echo $record['content'] ?>
      </div>
         <div class="special-p">
               <p>Are we right for you? If our values, philosophy and practice on the subject of Leadership and Personal/Professional Development appeal to you, then we should talk. If you&rsquo;re after more information or detail about our specific program offerings please drop us a line. We would love to hear from you.</p>
         </div>
      <div class="container">
         <div class="heading-container">
               <h2>Learning Programs/Modules</h2>
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
                  <div id="collapse<?php echo $i ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                     <div class="panel-body">
                        <?php echo $acc_record['oc_content']; ?>
                     </div>
                  </div>
               </div>
               <?php }while($acc_record = mysqli_fetch_array($acc_result)) ?>
            </div>
         </div>
   </div>
      <?php require_once 'includes/footer.html'; ?>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="assets/js/main.js"></script>
      <script type="text/javascript">
         $('.panel-heading').click(function() {
            $(this).toggleClass('panel-heading-opened');
            $('.panel-heading').not(this).removeClass('panel-heading-opened');
         })
      </script>
   </body>
   </html>
