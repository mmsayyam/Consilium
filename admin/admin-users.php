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

	$query = "SELECT * FROM users";
	$result = mysqli_query($con, $query);
	$record = mysqli_fetch_array($result);
	$row_count = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Users</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
	<?php require_once('../includes/header.php') ?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<?php require_once('../includes/add-user.php') ?>
			</div>
			
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<table class="table table-striped table-bordered">
					<tr>
						<th class="text-center" colspan="2">Username</th>
						<th class="text-center">Password</th>
						<th class="text-center">Access Level</th>
						<th class="text-center" colspan="2">Actions</th>
					</tr>
					<?php 
						if($row_count > 0) {
							$i = 0;
							do{ $i++;
					?>
					<tr>
						<td class="text-center">
							<?php echo $i; ?>
						</td>
						<td class="text-center">
							<?php echo $record['username'] ?>
						</td>
						<td class="text-center">
							<?php echo $record['password'] ?>
						</td>
						<td class="text-center">
							<?php echo $record['access'] ?>
						</td>
						<td class="text-center">
							Update
						</td>
						<td class="text-center">
							Delete
						</td>
					</tr>
					<?php
							} while ($record = $result->fetch_assoc());
						}
					?>
				</table>
			</div>
		</div>
		
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>