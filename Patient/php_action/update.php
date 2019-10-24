<?php 

require_once '../../db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$id = $_POST['member_id'];
	$firstname = $_POST['editFirstname'];
    $lastname = $_POST['editLastname'];
    $phone = $_POST['editPhone'];
    $address = $_POST['editAddress'];
	$cni = $_POST['editCni'];


	$sql = "UPDATE Patient SET patientFirst = '$firstname', patientLast = '$lastname', patientPhone = '$phone', patientAddress = '$address', patientCNI = '$cni' WHERE patientID = '$id'";
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