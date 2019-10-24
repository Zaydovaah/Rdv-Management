<?php 

require_once '../../db_connect.php';
$role = $_GET['role1'];
$output = array('data' => array());

$sql = "SELECT * FROM Doc, Patient, Service JOIN Rdv WHERE Rdv.patientID = Patient.patientID AND Rdv.servID = Service.servID AND Rdv.docID = Doc.docID";
$query = $connect->query($sql);

$x = 1;

while ($row = $query->fetch_assoc()) {

        $actionButton = '
	<div class="btn-group">
	  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" data-target="#editMemberModal" onclick="editMember('.$row['rdvID'].')"> <span class="glyphicon glyphicon-edit"></span> Edit</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeMemberModal" onclick="removeMember('.$row['rdvID'].')"> <span class="glyphicon glyphicon-trash"></span> Remove</a></li>	    
	  </ul>
	</div>
		';
    
	$output['data'][] = array(

		$x,
		$row['patientFirst']." ".$row['patientLast'],
		$row['servName'],
		$row['docFirst']." ".$row['docLast'],
		$row['rdvDate'],
		$row['rdvTime'],
		$row['patientCNI'],	
		$actionButton
	);

	$x ++;
}

// database connection close
$connect->close();

echo json_encode($output);