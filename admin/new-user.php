<?php require_once 'check_admin.php'; ?>
<?php
	require_once '../connections/connection.php';
	$message = "";
	if(isset($_POST['form-insert'])) {
		$username = $_POST['username'];
		$password = $_POST['pass'];
		$confirm = $_POST['confirm-pass'];
		if ($_POST['access-level'] == "Administrator") {
			$access_level = "admin";
		}
		else {
			$access_level = "user";
		}
		

		if($password == $confirm) {
			$query = "INSERT INTO users VALUES ('', '$username', '$password', '$access_level')";

			if($result = mysqli_query($con, $query)) {
				header("Location: admin-users.php");
			}
			else {
				$message = "Error Occured";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>New User</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
	<?php require_once('../includes/header.php') ?>

	<div class="container-fluid">
		<h3>
			<?php echo $message ?>
		</h3>
		<span class="glyphicon glyphicon-hand-left"></span>
		<a href="admin-users.php">Back</a>
		<form class="form-horizontal" action="new-user.php" method="post" name="new_user" id="new_user">
			<div class="form-group">
				<label class="col-sm-2 control-label" for="username">Username</label>
				<div class="col-sm-8">
					<input type="text" id="username" name="username" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="pass">Password</label>
				<div class="col-sm-8">
					<input type="password" id="pass" name="pass" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="confirm-pass">Confirm Password</label>
				<div class="col-sm-8">
					<input type="password" id="confirm-pass" name="confirm-pass" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="access-level">User Type</label>
				<div class="col-sm-8">
					<select class="form-control" id="access-level" name="access-level">
						<option>Administrator</option>
						<option>User</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
					<input type="submit" id="submit" name="submit" value="Submit Entry" class="form-control">
					<input type="hidden" name="form-insert" id="form-insert" value="form-insert">
				</div>
			</div>
		</form>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>