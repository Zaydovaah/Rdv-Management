<?php 

require_once '../../db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$id = $_POST['member_id'];
	$patient = $_POST['editPatient'];
    $service = $_POST['editService'];
    $doctor = $_POST['editDoctor'];
    $rdvDate = $_POST['editRdvDate'];
	$rdvTime = $_POST['editRdvTime'];

	$sql = "UPDATE Rdv SET patientID = '$patient', servID = '$service', docID = '$doctor', rdvDate = '$rdvDate', rdvTime = '$rdvTime' WHERE rdvID = '$id'";
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