<?php 
	include('dbconnect.php');
	session_start();

	if(isset($_POST['userLogin'])){

		// $email=mysqli_real_escape_string($conn,$_POST['email']);
		$email=$_POST['email'];
		$pwd=md5($_POST['pwd']);
		$sql="SELECT * FROM user_info WHERE email='$email' AND password='$pwd'";
		$sql2="SELECT count(*) as counter FROM user_info WHERE email='$email' AND password='$pwd'";
		// $run_query=mysqli_query($conn,$sql);
		// $count=mysqli_num_rows($run_query);
		$run_query=odbc_exec($conn,$sql);
		$run_query2=odbc_exec($conn,$sql2);
		$row=odbc_fetch_array($run_query2);
		$count=$row['counter'];

		if($count==1){
				// $row=mysqli_fetch_array($run_query);
				$row=odbc_fetch_array($run_query);
				$_SESSION['uid']=$row['user_id'];
				$_SESSION['uname']=$row['first_name'];
				echo "true";
		}
			
	}

 ?>