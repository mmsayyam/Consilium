<?php require_once 'connections/connection.php'; ?>
<?php 
if(!isset($_SESSION)) {
	session_start();
}
?>
<?php
$message = "";
if(isset($_POST['form-insert']) && isset($_POST['trigger'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' ";
	$result = mysqli_query($con, $query);
	$record = mysqli_fetch_array($result);
	$row_count = mysqli_num_rows($result);

	if($row_count > 0) {
		if(!isset($_SESSION)){
			session_start();
		}
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['access'] = $record['access'];
		if ($record['access'] == 'admin') {
			if(isset($_SESSION['redirect-to'])) {
					// header("Location: admin/".$_SESSION['redirect-to']);
			} else {
				header("Location: admin/index.php");
			}
		}
		elseif ($record['access'] == 'user') {
			header("Location: user-panel.php");
		}
		
	}
	else {
		$message = "Wrong Username or Password";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="assets/img/Consilium.svg">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./assets/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="assets/css/custom.min.css" />
	<title>Member Login</title>
</head>
<body>
	<?php require_once('includes/header.html') ?>

	<div class="c-container">
		<div class="container-fluid">
			<h3 class="text-center">
				<?php echo $message; ?>
			</h3>
			<form class="form-horizontal" id="login-form" action="member-login.php" method="post">
				<div class="form-group">
					<label for="username" class="control-label col-sm-2">Username</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" placeholder="Enter Username" name="username" id="username">
						<input type="hidden" value="form-insert" name="form-insert">
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="control-label col-sm-2">Password</label>
					<div class="col-sm-8">
						<input type="password" class="form-control" placeholder="Enter Password" name="password" id="password">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-4 col-sm-offset-4">
						<input type="submit" class="form-control" id="submit" name="submit" value="Submit">
						<input type="hidden" name="trigger" value="trigger" id="trigger">
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

</body>
</html>