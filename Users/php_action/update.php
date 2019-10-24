<?php 

require_once '../../db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$id = $_POST['member_id'];
	$firstname = $_POST['editFirstname'];
    $lastname = $_POST['editLastname'];
    $status = $_POST['editStatus'];
	$email = $_POST['editEmail'];
	$username = $_POST['editUsername'];
	$password = $_POST['editPassword'];
		 
	  ////  Update in users table
	$sql = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', roleID = '$status', email = '$email', username = '$username', password = '$password' WHERE userID = '$id'";
	$query = $connect->query($sql);
	  //// update in doctor(Doc) / Secretary Table
	
	if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Successfully Updated";		
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Error while updating the User information";
	}

	// close the database connection
	$connect->close();

	echo json_encode($validator);

}