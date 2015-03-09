<?php 
	$logout_goto = "index.php";
	if(!isset($_SESSION)) {
		session_start();
	}
	$_SESSION['username'] = NULL;
	unset($_SESSION['username']);

	if($logout_goto != "") {
		header("Location: $logout_goto");
		exit;
	}
?>