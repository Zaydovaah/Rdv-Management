<?php 

require_once '../../db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$id = $_POST['member_id'];
	$firstname = $_POST['editFirstname'];
    $lastname = $_POST['editLastname'];
    $service = $_POST['editService'];
    $phone = $_POST['editPhone'];
    $address = $_POST['editAddress'];
	$email = $_POST['editEmail'];


	$sql = "UPDATE Secretary SET secFirst = '$firstname', secLast = '$lastname', servID = '$service', secPhone = '$phone', secAddress = '$address', secMail = '$email' WHERE secID = '$id'";
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