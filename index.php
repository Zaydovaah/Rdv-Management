<?php 
 
// check connection
require_once 'db_connect.php';
 
session_start();
 
// check if users already logged in 
if(isset($_SESSION['user_id'])) {
    header('location:home.php');
    exit();
}
 
if( !empty($_POST) ) {
    $errors = array();
 
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    if( empty($username) || empty($password)) {
        $errors[] = '* Username/Password field is required';
    } 
    else {
        // check username and password
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $query = $connect->query($sql);
        if( $query->num_rows > 0 ) {
            
            $query = $connect->query($sql);
            $result = $query->fetch_array();
 
            $connect->close();
 
            if($query->num_rows == 1) {              
                $_SESSION['logged_in'] = true;
                $_SESSION['user_id'] = $result['userID'];
                $status = $result['roleID'];
 
                /// if admin
                if ($status == 1) {
                    header('location:home.php');
                    exit();
                }
                elseif ($status == 2) {
                    header('location:home.sec.php');
                    exit;
                }
                else {
                    header('location:home.doc.php');
                    exit;
                }
            }   
            else {
                $errors[] = ' * Username/Password combination is incorrect';
            }
        }   
        else {
            $errors[] = ' * Username doesn\'t exists';
        }
    }
 
}
 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
 
	<div class="container">
	<h1 class="page-header text-center">Hospital Appointments Management</h1>
	<h3 class="page-header text-center">Welcome! Enter your credentials to log in</h3>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
		    <div class="login-panel panel panel-primary">
		        <div class="panel-heading">
		            <h3 class="panel-title"><span class="glyphicon glyphicon-lock"></span> Login
		            </h3>
		        </div>
		    	<div class="panel-body">
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" >
	<fieldset>
        
             <div class="form-group">
                    <input class="form-control"  type="text" name="username" id="username" placeholder="Username" autofocus autocomplete="off" />
			 </div>
			 <div class="form-group">
                    <input class="form-control" type="password" name="password" id="password" placeholder="Password" autofocus autocomplete="off" />
			</div>
                    <button type="submit" class="btn btn-lg btn-primary btn-block"><span class="glyphicon glyphicon-log-in"> Login</span></button>
            
	</fieldset>
	<div style="height:10px;"></div>
	<?php if(!empty($errors)) {?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $key => $value) {
                echo $value;
            } ?>
        </div>
    <?php } ?>
    </form>
	</div>
	</div>
	</div>
	</div>
	</div>
</fieldset>
 
</body>
</html>