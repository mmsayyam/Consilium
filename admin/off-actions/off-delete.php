<?php
	require_once '../check_admin.php';
 	require_once'../../connections/connection.php';

 		$acc_query = "DELETE FROM offering_accordion WHERE oc_id = {$_GET['did']}";
		if($result = mysqli_query($con, $acc_query)) {
			header("Location: ../change-offering.php");
		}
		else {
			$message = "Error Occured";
			echo mysqli_error($con);
		}
	
?>