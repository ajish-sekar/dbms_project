<?php
	include('dbconnect.php');
	session_start();
	if(!isset($_SESSION['admin_id'])){
		header('location:admin_index.php');
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
	<link rel="shortcut icon" href="assets/images/fav.png">
</head>
<body scroll="no">
	<div class="navbar navbar-default navbar-fixed-top"  id="topnav">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">FlipTruck</a>
			</div>

			
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>Hello, <?php echo $_SESSION['admin_name']; ?></a>
				<ul class="dropdown-menu">
					<li><a href="admin_logout.php">Logout</a></li>
				</ul>

				</li>

			</ul>

		</div>
	</div>

   	<div style="margin-top: 5%;margin-left:2%;max-width: 20%;">      
        	<label for="brand_name">Add brand</label>
			<input type="text" class="form-control" id="brand_name" style="float:left;">
			<input type="submit" class="btn btn-primary" style="float:left;bottom:20px;margin-top: 1%" id="brand_add" value="brand Add" name="">
	</div>			

	<div class="row" style="max-width: 30%;float: middle;margin-left:30% ">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="err_msg"></div>
			<div class="col-md-2"></div>
		</div>		
   
   <br>
   <div style="max-width: 25%;height:20%;margin-left:3%;margin-top:1%;overflow:scroll;float:left; ">
   	<p>Update Quantity</p>
   	
 <?php
	   // $result = mysqli_query($conn,"SELECT product_id,product_title, product_qty FROM products");
	$result = odbc_exec($conn,"SELECT product_id,product_title, product_qty FROM products");
    echo "<table border='1'>
    <tr> 
    <th>Id</th>
    <th>Product</th>
    <th>Quantity</th>
    </tr>";
    // while($row = mysqli_fetch_array($result))
    // {echo "<tr>";
    //  $id = $row['product_id'];
    //  echo "<td style='width:1%'>" . $row['product_id'] . "</td>";
    //  echo "<td style='width:300px'>" . $row['product_title'] . "</td>";
    //  echo "<td style='width:1%' id='$id'>" . $row['product_qty'] . "</td>";
    //  echo "</tr>";
	// }
	while($row = odbc_fetch_array($result))
    {echo "<tr>";
     $id = $row['product_id'];
     echo "<td style='width:1%'>" . $row['product_id'] . "</td>";
     echo "<td style='width:300px'>" . $row['product_title'] . "</td>";
     echo "<td style='width:1%' id='$id'>" . $row['product_qty'] . "</td>";
     echo "</tr>";
    }
    echo "</table>";
    ?>

   </div>

   <div style="margin-top: 5%;float:left;max-width:10%;">
   	   <label for="update_id">Product Id</label>
	   <input type="number" style = "float:middle" class="form-control" id="update_id">
	   
	   <label for="update_qty">Quantity</label>
	   <input type="number" style = "float:middle" class="form-control" id="update_qty">

	   <input type="submit" class="btn btn-primary" style="float:left;bottom:20px;margin-top:1%" id="Update" value="Update" name="">
														
   </div>

    <form method="post" action="" style=" float:middle; margin-left: 30%;margin-top:0%;position:relative;">
        
    <div id = "products" style="max-width: 30%; margin-top: 0%;float:right">
        <p> Add Product </p>
        <?php 
    	$query = "select brand_title from brands"; 
		// $run_query=mysqli_query($conn,$query);
		$run_query=odbc_exec($conn,$query);
        echo '<select name="Brand" id="Brand">';           
        // while ($row = mysqli_fetch_array($run_query)) {
        // echo '<option value="'.$row['brand_title'].'">'.$row['brand_title'].'</option>';
		// }
		while ($row = odbc_fetch_array($run_query)) {
			echo '<option value="'.$row['brand_title'].'">'.$row['brand_title'].'</option>';
			}

        echo '</select>';
       
        
        $query = "select cat_title from categories"; 
		// $run_query=mysqli_query($conn,$query);
		$run_query=odbc_exec($conn,$query);
        echo '<select name="Category" id="Category">';           
        // while ($row = mysqli_fetch_array($run_query)) {
        // echo '<option value="'.$row['cat_title'].'">'.$row['cat_title'].'</option>';
		// }
		while ($row = odbc_fetch_array($run_query)) {
			echo '<option value="'.$row['cat_title'].'">'.$row['cat_title'].'</option>';
			}

        echo '</select>';
        ?>
        
        <br>
        <label for="product_name">Product Name</label>
		<input type="text" class="form-control" id="product_name" name = "product_name" style="max-width: 40%">
		
		<label for="product_price">Price</label>
	    <input type="number" class="form-control" id="product_price" name = "product_price" style="max-width: 40%">
		
		<label for="product_qty">Quantity</label>
		<input type="number" class="form-control" id="product_qty" name = "product_qty" style="max-width: 40%">
		
		<label for="product_img">Image</label>
		<input type="text" class="form-control" id="product_img" name = "product_img" style="max-width: 40%">
		
		<label for="product_desc">Description</label>
		<input type="text" class="form-control" id="product_desc" name = "product_desc" style="max-width: 40%">
		
		<label for="product_word">Keywords</label>
		<input type="text" class="form-control" id="product_word" name = "product_word" style="max-width: 40%"s>
		
		<input type="button" class="btn btn-primary" value="Add product" id="add_prod_btn" name="add_prod_btn" style="margin-top:1% ">												

       	
    </div>
    </form>
   
 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
	<script src="assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	<script src="main.js"></script>


      <style>
  	#footer {
     position: absolute;
     margin-bottom:1%;
     width:100%;
     text-align: center;
     margin-top: 50%;
    }
    
    #brands{
    	position: absolute;
    	margin-left: 10%;
    	margin-top: 5%;
    	width:25%;
    	border-color: black;
    	border:2em;
    }

    #products{
    	position: absolute;
    	margin-left: 50%;
    	margin-top: 5%;
    	width:40%;
    	height:50%;
    	border-left: 5%;
    	border-color: black;
    	border:2em;
    }

  </style>
<div id="footer">
           <p >Made with love by ASVAS<span class='glyphicon glyphicon-heart'></span> </a></p>
  </div>
 
</body>
 
 <!-- <div class="foot">
	<footer style="border-bottom: 20px">
         <p >Made with love by ASVAS<span class='glyphicon glyphicon-heart'></span> </a></p>
    </footer>
  </div>

  <style>
   .foot{text-align: center;}
  </style>
-->
 
</html>
