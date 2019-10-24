<?php 

require_once '../../db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$id = $_POST['member_id'];
	$name = $_POST['editName'];

	$sql = "UPDATE Service SET servName = '$name' WHERE servID = '$id'";
	$query = $connect->query($sql);
	
	if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Successfully Updated";		
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Error while updating informations";
	}

	// close the database connection
	$connect->close();

	echo json_encode($validator);

}