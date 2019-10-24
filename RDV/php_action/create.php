<?php 

require_once '../../db_connect.php';

//if form is submitted
if($_POST) {	
    
	$validator = array('success' => false, 'messages' => array());

	$patient = ($_POST['patient']);
    $service = ($_POST['service']);
    $doctor = ($_POST['doctor']);
    $rdvDate = ($_POST['rdvDate']);
	$rdvTime = ($_POST['rdvTime']);

	$sql = "INSERT INTO Rdv (patientID, servID, docID, rdvDate, rdvTime) VALUES ('$patient', '$service', '$doctor', '$rdvDate', '$rdvTime')";
    $query = $connect->query($sql);

	if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Successfully Added";		
	} 
	else {
		$validator['success'] = false;
		$validator['messages'] = "Error while adding the member information";
	}

	// close the database connection
	$connect->close();

	echo json_encode($validator);

}