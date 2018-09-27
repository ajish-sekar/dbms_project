<?php 
	include('../dbconnect.php');
	session_start();

	if(isset($_POST['adminLogin'])){

		$admin_name=mysqli_real_escape_string($conn,$_POST['admin_name']);
		$admin_pwd=md5($_POST['admin_pwd']);
		$sql="SELECT * FROM admin WHERE name='$admin_name' AND password='$admin_pwd'";
		$run_query=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($run_query);

		if($count==1){
				$row=mysqli_fetch_array($run_query);
				$_SESSION['admin_id']=$row['id'];
				$_SESSION['admin_name']=$row['name'];
				echo "true";
		}
			
	}

 ?>

 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>FlipTruck</title>
	<link rel="stylesheet" type="text/css" href="http://kenwheeler.github.io/slick/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="http://kenwheeler.github.io/slick/slick/slick-theme.css"/>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../styles.css">

</head>
<body>


	<div class="navbar navbar-default navbar-fixed-top" id="topnav">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="../index.php" class="navbar-brand">FlipTruck</a>
			</div>
			
				<div style="width: 300px;">
						<div class="panel panel-primary">
							<div class="panel-heading">Login</div>
							<div class="panel-heading">
								<label for="admin_name">Name</label>
								<input type="text" class="form-control" id="admin_name">
								<label for="admin_pwd">Password</label>
								<input type="password" class="form-control" id="admin_pwd">
								<p><br></p>
								<a href="#" style="color: white;list-style-type: none;">Forgot Password?</a>
								<input type="submit" class="btn btn-success" style="float: right;bottom:12px;" id="admin_login" value="Login" name="">
							</div>
							<div class="panel-footer" id="e_msg"></div>
						</div>
				</div>
				    
			
		</div>
	</div>
		<br><br><br>
		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
	<script src="assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	<script src="../main.js"></script>
</body>


<!-- <style> .foot{text-align: center;} -->
</style>
</html>
