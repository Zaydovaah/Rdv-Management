<?php 

require_once '../../db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$id = $_POST['member_id'];
	$firstname = $_POST['editFirstname'];
    $lastname = $_POST['editLastname'];
    $speciality = $_POST['editSpeciality'];
    $phone = $_POST['editPhone'];
    $address = $_POST['editAddress'];
	$email = $_POST['editEmail'];


	$sql = "UPDATE Doc SET docFirst = '$firstname', docLast = '$lastname', specID = '$speciality', docPhone = '$phone', docAddress = '$address', docMail = '$email' WHERE docID = '$id'";
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