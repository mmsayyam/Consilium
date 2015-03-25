<?php 
if(!isset($_SESSION)) {
	session_start();
}
if(isset($_GET['redirect-to'])) {
	$redirected = $_GET['redirect-to'];
	echo $redirected;
	switch($redirected) {
		case "what-we-do.php":
		$_SESSION['redirect-to'] = "change-wwd.php";
		if(!isset($_SESSION['username']) || $_SESSION['access'] != "admin"){
			header('Location: member-login.php');
		} else {
			header('Location: admin/'.$_SESSION['redirect-to']);
		}
		break;
		case "who-we-are.php":
		$_SESSION['redirect-to'] = "change-wwa.php";
		if(!isset($_SESSION['username']) || $_SESSION['access'] != "admin"){
			header('Location: member-login.php');
		} else {
			header('Location: admin/'.$_SESSION['redirect-to']);
		}
		break;
		case "who-will-benefit.php":
		$_SESSION['redirect-to'] = "change-wwb.php";
		if(!isset($_SESSION['username']) || $_SESSION['access'] != "admin"){
			header('Location: member-login.php');
		} else {
			header('Location: admin/'.$_SESSION['redirect-to']);
		}
		break;
		case "features-videos.php": 
		$_SESSION['redirect-to'] = "insert-gallery.php";
		if(!isset($_SESSION['username']) || $_SESSION['access'] != "admin"){
			header('Location: member-login.php');
		} else {
			header('Location: admin/'.$_SESSION['redirect-to']);
		}
		break;
		case "offerings.php":
		$_SESSION['redirect-to'] = "change-offering.php";
		if(!isset($_SESSION['username']) || $_SESSION['access'] != "admin"){
			header('Location: member-login.php');
		} else {
			header('Location: admin/'.$_SESSION['redirect-to']);
		}
		break;
		default:
		header('Location: index.php');
	}

} else {
	header('Location: index.php');
}
?>