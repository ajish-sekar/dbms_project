<?php 
	include('dbconnect.php');
	session_start();

	if(isset($_POST['adminLogin'])){

		// $name=mysqli_real_escape_string($conn,$_POST['admin_name']);
		$name=$_POST['admin_name'];
		$pwd=md5($_POST['admin_pwd']);
		$sql="SELECT * FROM admin WHERE name='$name' AND password='$pwd'";
		$sql2="SELECT count(*) as counter FROM admin WHERE name='$name' AND password='$pwd'";
		// $run_query=mysqli_query($conn,$sql);
		// $count=mysqli_num_rows($run_query);
		$run_query=odbc_exec($conn,$sql);
		$run_query2=odbc_exec($conn,$sql2);
		$row=odbc_fetch_array($run_query2);
		$count=$row['counter'];
        
		if($count==1){
				// $row=mysqli_fetch_array($run_query);
				$row=odbc_fetch_array($run_query);
				$_SESSION['admin_id']=$row['id'];
				$_SESSION['admin_name']=$row['name'];
				echo "true";
		}
			
	}

 ?>