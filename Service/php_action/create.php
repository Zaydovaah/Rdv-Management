<?php 

require_once '../../db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$name = ($_POST['name']);
	

	$sql = "INSERT INTO Service (servName) VALUES ('$name')";
    $query = $connect->query($sql);

	if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Successfully Added";		
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Error while adding record";
	}

	// close the database connection
	$connect->close();

	echo json_encode($validator);

}
