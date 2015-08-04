<?php
	require_once '../check_admin.php';
 	require_once'../../connections/connection.php';

 		$acc_query = "DELETE FROM users WHERE user_id = {$_GET['did']}";
		if($result = mysqli_query($con, $acc_query)) {
			header("Location: ../admin-users.php");
		}
		else {
			$message = "Error Occured";
			echo mysqli_error($con);
		}
	
?>