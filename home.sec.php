<?php 
 
require_once 'db_connect.php';
session_start();
 
// check if user is not logged in 
if(empty($_SESSION['user_id'])) {
    header('location:index.php');
    exit();
}
 
if(isset($_SESSION['user_id'])) { ?>


<?php 
$user_id = $_SESSION['user_id'];

 
$sql = "SELECT * FROM users JOIN Role WHERE users.roleID = Role.roleID AND users.userID = $user_id";
$query = $connect->query($sql);
$row = $query->fetch_array();
$role = $row['roleID'];
// close database connection
$connect->close();
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
 </head>
<body>
    <div class="container">
        <h1 class="page-header text-center">Dashboard <small>Secretary</small> </h1>
        <div class="row">
            <div class="col-md-4 col-md-offset-3">
                <h2>Welcome! </h2>
                <h4><span class="glyphicon glyphicon-user" aria-hidden="true"></span><span></span> User Info: </h4>
                <p> <strong> Name:</strong> <?php echo $row['lastname']." ".$row['firstname']; ?></p>
                <p> <strong>Status:</strong> <?php echo $row['roleName']; ?></p>
                <p> <strong>Username:</strong> <?php echo $row['username']; ?></p>
                <p> <strong>Password:</strong> <?php echo $row['password']; ?></p>
                <a href="logout.php" class="btn btn-danger"><span class="glyphicon glyphicon-log-out"></span>
                    Logout</a>
            </div>
            <div>

                <div class="col-md-4">

                    <h2>Actions</h2>
                    <div style="height:20px;"></div>
                    <a href="Doctor/doc_for_sec.php" data-toggle="modal" class="btn btn-primary" style="width:200px">Available Doctor(s)</a>
					<div style="height:20px;"></div>
                    <a href="Patient/patient_for_sec.php" data-toggle="modal" class="btn btn-primary" style="width:200px">View Patients</a>
                    <div style="height:20px;"></div>
                    <a href="RDV/rdv_for_sec.php" data-toggle="modal" class="btn btn-primary" style="width:200px">View RDVs</a></button>
                    <div style="height:20px;"></div>
                    <a href="Secretary/sec_for_sec.php" data-toggle="modal" class="btn btn-primary" style="width:200px">Available Secretaries</a>
                    <div style="height:20px;"></div>
                    <a href="Service/serv_for_sec.php" data-toggle="modal" class="btn btn-primary" style="width:200px">View Services</a></button>
                    <div style="height:20px;"></div>
                    <a href="Speciality/spec_for_sec.php" data-toggle="modal" class="btn btn-primary" style="width:200px">View Specialities</a>
                </div>
            </div>
        </div>
    </div>
    </body>

</html>
<?php
}
?>