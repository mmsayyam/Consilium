<?php
	require_once '../check_admin.php';
 	require_once'../../connections/connection.php';

 		$acc_query = "DELETE FROM wwd_accordion WHERE dc_id = {$_GET['did']}";
		if($result = mysqli_query($con, $acc_query)) {
			header("Location: ../change-wwd.php");
		}
		else {
			$message = "Error Occured";
			echo mysqli_error($con);
		}
	
?>