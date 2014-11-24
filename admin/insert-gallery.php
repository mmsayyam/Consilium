<?php $con = mysqli_connect('LocalHost', 'root', '', 'consultancy');
	$title = "Dandelion horseradish";
	$desc = "Cabbage bamboo shoot broccoli rabe chickpea chard sea lettuce lettuce ricebean artichoke earthnut pea aubergine okra brussels sprout avocado tomato.";
	$original = "video3.jpg";
	$thumb = "video3.jpg";
	$alt = "img03";

	$query = "INSERT INTO gallery VALUES ('', '$title', '$desc', '$original', '$thumb', '$alt')";

	if($result = mysqli_query($con, $query)) {
				echo "done";
			}
			else {
				echo "Error Occured";
			}
	$title = "Dandelion horseradish";
	$desc = "Cabbage bamboo shoot broccoli rabe chickpea chard sea lettuce lettuce ricebean artichoke earthnut pea aubergine okra brussels sprout avocado tomato.";
	$original = "video1.jpg";
	$thumb = "video1.jpg";
	$alt = "img01";

	$query = "INSERT INTO gallery VALUES ('', '$title', '$desc', '$original', '$thumb', '$alt')";

	if($result = mysqli_query($con, $query)) {
				echo "done";
			}
			else {
				echo "Error Occured";
			}

	$title = "Dandelion horseradish";
	$desc = "Cabbage bamboo shoot broccoli rabe chickpea chard sea lettuce lettuce ricebean artichoke earthnut pea aubergine okra brussels sprout avocado tomato.";
	$original = "video2.jpg";
	$thumb = "video2.jpg";
	$alt = "img02";

	$query = "INSERT INTO gallery VALUES ('', '$title', '$desc', '$original', '$thumb', '$alt')";

	if($result = mysqli_query($con, $query)) {
				echo "done";
			}
			else {
				echo "Error Occured";
			}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Consilium - Insert into Gallery</title>
</head>
<body>

</body>
</html>