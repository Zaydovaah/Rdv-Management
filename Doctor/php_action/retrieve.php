<?php 
require_once '../../db_connect.php';



$output = array('data' => array());

$sql = "SELECT * FROM Doc JOIN Speciality WHERE Doc.specID=Speciality.specID";
$query = $connect->query($sql);


$x = 1;

while ($row = $query->fetch_assoc()) {
	
   
        $actionButton = '
		<div class="btn-group">
		  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Action <span class="caret"></span>
		  </button>
		  <ul class="dropdown-menu">
			<li><a type="button" data-toggle="modal" data-target="#editMemberModal" onclick="editMember('.$row['docID'].')"> <span class="glyphicon glyphicon-edit"></span> Edit</a></li>
			<li><a type="button" data-toggle="modal" data-target="#removeMemberModal" onclick="removeMember('.$row['docID'].')"> <span class="glyphicon glyphicon-trash"></span> Remove</a></li>	    
		  </ul>
		</div>
			';
	
	
 
	$output['data'][] = array(

		$x,
		$row['docFirst'],
		$row['docLast'],
		$row['docPhone'],
		$row['docMail'],
		$row['docAddress'],
		$row['specName'],	
		$actionButton
	);

	$x ++;
}

// database connection close
$connect->close();

echo json_encode($output);

