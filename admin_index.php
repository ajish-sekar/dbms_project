<?php
	session_start();
    if(isset($_SESSION['admin_id'])){
		header('location:admin_home.php');
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
	<link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>


	<div class="navbar navbar-default navbar-fixed-top" id="topnav" style="height:32%">
		<div class="container-fluid">
			<div class="navbar-header" style="width:35%;max-height: 100%">
				<a href="index.php" class="navbar-brand">FlipTruck</a>
			
				<div style="width: 300px; margin-left:30%;margin-top:1.5%">
						<div class="panel panel-primary">
							<div class="panel-heading">Login</div>
							<div class="panel-heading">
								<label for="admin_name">Name</label>
								<input type="text" class="form-control" id="admin_name">
								<label for="admin_pwd">Password</label>
								<input type="password" class="form-control" id="admin_pwd">
						    	
							</div>
							<input type="submit" class="btn btn-success" style="float:left;bottom:20px;margin-top: 1%" id="admin_login" value="adminLogin" name="">
						</div>
				</div>
			</div>
    	</div>
	</div>
		<br><br><br>
		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
	<script src="assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	<script src="main.js"></script>
</body>
</style>
</html>
