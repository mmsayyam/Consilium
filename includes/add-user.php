<?php 
 	if(!isset($_SESSION)) {
 		session_start();
 	}
 	if (!isset($_SESSION['username']) || $_SESSION['access'] != "admin") {
 		header("Location: ../member-login.php");
 	}
?>
<?php
	require_once '../connections/connection.php';
	$message = "";
	if(isset($_POST['new_user'])) {
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
<div class="panel panel-default text-center">
	<div class="panel-heading">
		<h4>
			Add New User
		</h4>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" action="admin-users.php" method="post" name="new_user" id="new_user">
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
</div>