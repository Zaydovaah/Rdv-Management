<?php 

include '../db_connect.php';

?>

<!DOCTYPE html>
<html lang='eng'>
<head>
	<title>RDV</title>

	<!-- bootstrap css -->
	<link rel="stylesheet" type="text/css" href="../assests/bootstrap/css/bootstrap.min.css">
	<!-- datatables css -->
	<link rel="stylesheet" type="text/css" href="../assests/datatables/datatables.min.css">
    <!-- datepicker css -->
	<link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">

</head>
<body>
<!---NAV START---->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../home.sec.php">Rdv App</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
	    <li class="inactive"><a href="../home.sec.php">Home</a></li>
		<li class="inactive"><a href="../Doctor/doc_for_sec.php">View Doctor(s) <span class="sr-only">(current)</span></a></li>
		<li class="inactive"><a href="../Patient/patient_for_sec.php">View Patients<span class="sr-only">(current)</span></a></li>
		<li class="active"><a href="rdv_for_sec.php">View or Appoint RDV<span class="sr-only">(current)</span></a></li>
		<li class="inactive"><a href="../Secretary/sec_for_sec.php">Available Secretaries<span class="sr-only">(current)</span></a></li>
		<li class="inactive"><a href="../Service/serv_for_sec.php">View Services<span class="sr-only">(current)</span></a></li>
		<li class="inactive"><a href="../Speciality/spec_for_sec.php">View Specialities<span class="sr-only">(current)</span></a></li>
	</ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../logout.php" class="btn btn-danger"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!---NAV END---->
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<center><h1 class="page-header">RDV Records</h1> </center>

				<div class="removeMessages"></div>

				<button class="btn btn-primary btn-lg pull pull-right" data-toggle="modal" data-target="#addMember" id="addMemberModalBtn">
					<span class="glyphicon glyphicon-plus-sign"></span>	Add Record
				</button>

				<br /> <br /> <br />

				<table class="table table-striped" id="manageMemberTable">					
					<thead>
						<tr>
							<th>ID</th>
							<th>Full Name</th>													
							<th>Service</th>								
							<th>Doctor</th>
							<th>Date</th>
							<th>Time</th>
							<th>Patient CNI</th>
							<th>Option</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>

	<!-- add modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="addMember">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span>	Add Member</h4>
	      </div>
	      
	      <form class="form-horizontal" action="php_action/create.php" method="POST" id="createMemberForm">

	      <div class="modal-body">
			  <div class="messages"></div>
			  <div class="form-group">
			    <label for="patient" class="col-sm-2 control-label">Patient</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="patient" id="patient">
			      	<option value="">~~SELECT~~</option>
					  <?php
					  $sql = "SELECT * FROM Patient";
					  $query = $connect->query($sql);
					  while ($row = $query->fetch_assoc()) {
						echo "<option value=\"$row[patientID]\" >".$row4['patientCNI']." | ".$row['patientLast']." ".$row['patientFirst']."</option>";
						}
					  ?>
				  </select>
				  <!-- here the text will apper  -->
			    </div>
			  </div>			 	
			  <div class="form-group">
			    <label for="service" class="col-sm-2 control-label">Service</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="service" id="service">
			      	<option value="">~~SELECT~~</option>
					  <?php
					  $sql = "SELECT * FROM Service";
					  $query = $connect->query($sql);
					  while ($row = $query->fetch_assoc()) {
						echo "<option value=\"$row[servID]\" >".$row['servName']."</option>";
						}
					  ?>
				  </select>
				  <!-- here the text will apper  -->
			    </div>
			  </div>			 	
			  <div class="form-group">
			    <label for="doctor" class="col-sm-2 control-label">Doctor</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="doctor" id="doctor">
			      	<option value="">~~SELECT~~</option>
					  <?php
					  $sql = "SELECT * FROM Doc JOIN Speciality WHERE Doc.specID = Speciality.specID";
					  $query = $connect->query($sql);
					  while ($row = $query->fetch_assoc()) {
						echo "<option value=\"$row[docID]\" >".$row['specName']." | ".$row['docFirst']." ".$row['docLast']."</option>";
						}
					  ?>
				  </select>
				  <!-- here the text will apper  -->
			    </div>
			  </div>	
			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="rdvDate" class="col-sm-2 control-label">Date</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" id="rdvDate" name="rdvDate" placeholder="Date">
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="rdvTime" class="col-sm-2 control-label">Time</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" id="rdvTime" name="rdvTime" placeholder="HH:MM">
				<!-- here the text will apper  -->
			    </div>
			  </div>		 		
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save changes</button>
	      </div>
	      </form> 
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /add modal -->

	<!-- remove modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="removeMemberModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span> Remove Record</h4>
	      </div>
	      <div class="modal-body">
	        <p>Do you really want to remove ?</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary" id="removeBtn">Save changes</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /remove modal -->

	<!-- edit modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="editMemberModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Edit Record</h4>
	      </div>

		<form class="form-horizontal" action="php_action/update.php" method="POST" id="updateMemberForm">	      

	      <div class="modal-body">
	        	
	        <div class="edit-messages"></div>

			<div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="rdvID" class="col-sm-2 control-label">ID</label>
			    <div class="col-sm-10"> 
			      <input type="number" class="form-control" id="rdvID" name="rdvID" placeholder="ID" readonly>
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="editPatient" class="col-sm-2 control-label">Patient</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="editPatient" id="editPatient">
				  <option value="">~~SELECT~~</option>
					  <?php
					  $sql = "SELECT * FROM Patient";
					  $query = $connect->query($sql);
					  while ($row = $query->fetch_assoc()) {
						echo "<option value=\"$row[patientID]\" >".$row4['patientCNI']." | ".$row['patientFirst']." ".$row['patientLast']."</option>";
						}
					  ?>
				  </select>
				  <!-- here the text will apper  -->
			    </div>
			  </div>			 	
			  <div class="form-group">
			    <label for="editService" class="col-sm-2 control-label">Service</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="editService" id="editService">
				  <option value="">~~SELECT~~</option>
					  <?php
					  $sql = "SELECT * FROM Service";
					  $query = $connect->query($sql);
					  while ($row = $query->fetch_assoc()) {
						echo "<option value=\"$row[servID]\" >".$row['servName']."</option>";
						}
					  ?>
				  </select>
				  <!-- here the text will apper  -->
			    </div>
			  </div>			 	
			  <div class="form-group">
			    <label for="editDoctor" class="col-sm-2 control-label">Doctor</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="editDoctor" id="editDoctor">
				  <option value="">~~SELECT~~</option>
					  <?php
					  $sql = "SELECT * FROM Doc JOIN Speciality WHERE Doc.specID = Speciality.specID";
					  $query = $connect->query($sql);
					  while ($row = $query->fetch_assoc()) {
						echo "<option value=\"$row[docID]\" >".$row['specName']." | ".$row['docFirst']." ".$row['docLast']."</option>";
						}
					  ?>
				  </select>
				  <!-- here the text will apper  -->
			    </div>
			  </div>	
			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="editRdvDate" class="col-sm-2 control-label">Date</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" id="editRdvDate" name="editRdvDate" placeholder="Date">
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="editRdvTime" class="col-sm-2 control-label">Time</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" id="editRdvTime" name="editRdvTime" placeholder="Time">
				<!-- here the text will apper  -->
			    </div>
			  </div>		 			 		
	      </div>
	      <div class="modal-footer editMemberModal">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save changes</button>
	      </div>
	      </form>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /edit modal -->

	<!-- jquery plugin -->
	<script type="text/javascript" src="../assests/jquery/jquery.min.js"></script>
	<!-- bootstrap js -->
	<script type="text/javascript" src="../assests/bootstrap/js/bootstrap.min.js"></script>
	<!-- datatables js -->
	<script type="text/javascript" src="../assests/datatables/datatables.min.js"></script>
	<!-- include custom index.js -->
	<script type="text/javascript" src="custom/js/rdv.js"></script>
	<!---Datepicker script--->
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<!---Datepicker call function--->
   <script>
		$(function() {
		$( "#rdvDate, #editRdvDate" ).datepicker({
		beforeShowDay: $.datepicker.noWeekends,
		minDate: 1
		});
		});
   </script>
  
</body>
</html>