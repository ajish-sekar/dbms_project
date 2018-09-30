<?php 
	include('dbconnect.php');
	session_start();

	if(isset($_POST['adminLogin'])){

		$name=mysqli_real_escape_string($conn,$_POST['admin_name']);
		$pwd=md5($_POST['admin_pwd']);
		$sql="SELECT * FROM admin WHERE name='$name' AND password='$pwd'";
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