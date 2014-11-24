<?php
$con = mysqli_connect('LocalHost', 'root', '', 'consultancy');
$items_per_group = 8;
if($_POST){

	//sanitize post value
	$group_number = filter_var($_POST["group_no"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

	//throw HTTP error if group number is not valid
	if(!is_numeric($group_number)){
	    echo "Failed Numbering";
	    exit();
	}

	//get current starting point of records
	$position = ($group_number * $items_per_group);

	//Limit our results within a specified range.
	$results = $con->query("SELECT * FROM gallery ORDER BY g_id ASC LIMIT $position, $items_per_group");

	if ($results) {
	    //output results from database
	   
	    while($obj = $results->fetch_object())
	    {
	        echo '
	        	<li>
                    <a href="gallery/images/'.$obj->g_original.'" title="'.$obj->g_title.'" data-subtitle="View Picture" data-caption="<strong>'.$obj->g_desc.'</strong>">
                        <img src="gallery/images/'.$obj->g_thumb.'" alt="'.$obj->g_alt.'" />
                    </a>
                </li>';
	    }

	}
	unset($obj);
	$con->close();
}
?>