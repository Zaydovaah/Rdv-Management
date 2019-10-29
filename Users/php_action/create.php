<?php 

require_once '../../db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$firstname = ($_POST['firstname']);
    $lastname = ($_POST['lastname']);
    $status = ($_POST['status']);
    $email = ($_POST['email']);
	$password = ($_POST['password']);
	$password_check = ($_POST['password_check']);
    $username = ($_POST['username']);
	

    $sql = "INSERT INTO users (roleID, username, password, firstname, lastname, email) VALUES ('$status', '$username', '$password', '$firstname', '$lastname', '$email')";
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
