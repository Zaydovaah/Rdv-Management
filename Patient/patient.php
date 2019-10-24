<?php 

include '../db_connect.php';

?>

<!DOCTYPE html>
<html lang='eng'>
<head>
	<title>Patients</title>

	<!-- bootstrap css -->
	<link rel="stylesheet" type="text/css" href="../assests/bootstrap/css/bootstrap.min.css">
	<!-- datatables css -->
	<link rel="stylesheet" type="text/css" href="../assests/datatables/datatables.min.css">

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
      <a class="navbar-brand" href="../home.php">Rdv App</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
	    <li class="inactive"><a href="../home.php">Home</a></li>
		<li class="inactive"><a href="../Doctor/doc.php">View Doctor(s) <span class="sr-only">(current)</span></a></li>
		<li class="active"><a href="patient.php">View Patients<span class="sr-only">(current)</span></a></li>
		<li class="inactive"><a href="../RDV/rdv.php">View or Appoint RDV<span class="sr-only">(current)</span></a></li>
		<li class="inactive"><a href="../Secretary/sec.php">Available Secretaries<span class="sr-only">(current)</span></a></li>
		<li class="inactive"><a href="../Service/serv.php">View Services<span class="sr-only">(current)</span></a></li>
		<li class="inactive"><a href="../Speciality/spec.php">View Specialities<span class="sr-only">(current)</span></a></li>
		<li class="inactive"><a href="../Users/users.php">View Users<span class="sr-only">(current)</span></a></li>
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

				<center><h1 class="page-header">Admin <small>Patient Records</small> </h1> </center>

				<div class="removeMessages"></div>

				<button class="btn btn-primary btn-lg pull pull-right" data-toggle="modal" data-target="#addMember" id="addMemberModalBtn">
					<span class="glyphicon glyphicon-plus-sign"></span>	Add Record
				</button>

				<br /> <br /> <br />

				<table class="table table-striped" id="manageMemberTable">					
					<thead>
						<tr>
							<th>ID</th>
							<th>Firstname</th>													
							<th>Lastname</th>							
							<th>Phone</th>
							<th>Address</th>
							<th>CNI</th>
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
	        <h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span>	Add Record</h4>
	      </div>
	      
	      <form class="form-horizontal" action="php_action/create.php" method="POST" id="createMemberForm">

	      <div class="modal-body">
	      	<div class="messages"></div>

			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="firstname" class="col-sm-2 control-label">Firstname</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="firstname">
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="lastname" class="col-sm-2 control-label">lastname</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="lastname">
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="phone" class="col-sm-2 control-label">phone</label>
			    <div class="col-sm-10">
				  <input type="number" class="form-control" id="phone" name="phone" placeholder="phone">
				  <!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="address" class="col-sm-2 control-label">Address</label>
			    <div class="col-sm-10">
				  <input type="text" class="form-control" id="address" name="address" placeholder="Address">
				  <!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="cni" class="col-sm-2 control-label">CNI</label>
			    <div class="col-sm-10">
				  <input type="number" class="form-control" id="cni" name="cni" placeholder="CNI">
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
			    <label for="patientID" class="col-sm-2 control-label">ID</label>
			    <div class="col-sm-10"> 
			      <input type="number" class="form-control" id="patientID" name="patientID" placeholder="ID" readonly>
				<!-- here the text will apper  -->
			    </div>
			  </div>
			<div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="editFirstname" class="col-sm-2 control-label">Firstname</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" id="editFirstname" name="editFirstname" placeholder="firstname">
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="editLastname" class="col-sm-2 control-label">lastname</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" id="editLastname" name="editLastname" placeholder="lastname">
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="editPhone" class="col-sm-2 control-label">phone</label>
			    <div class="col-sm-10">
				  <input type="number" class="form-control" id="editPhone" name="editPhone" placeholder="phone">
				  <!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="editAddress" class="col-sm-2 control-label">Address</label>
			    <div class="col-sm-10">
				  <input type="text" class="form-control" id="editAddress" name="editAddress" placeholder="Address">
				  <!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="editCni" class="col-sm-2 control-label">CNI</label>
			    <div class="col-sm-10">
				  <input type="number" class="form-control" id="editCni" name="editCni" placeholder="CNI">
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
	<script type="text/javascript" src="custom/js/patient.js"></script>

</body>
</html>