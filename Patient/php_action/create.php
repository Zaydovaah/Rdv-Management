<?php 

require_once '../../db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$firstname = ($_POST['firstname']);
    $lastname = ($_POST['lastname']);
    $phone = ($_POST['phone']);
    $address = ($_POST['address']);
    $cni = ($_POST['cni']);
	

	$sql = "INSERT INTO Patient (patientFirst, patientLast, patientPhone, patientAddress, patientCNI) VALUES ('$firstname', '$lastname', '$phone', '$address', '$cni')";
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
