<?php 
	
	include('dbconnect.php');
	
	$brand=$_POST['Brand'];
	$category=$_POST['Category'];
	$p_name=$_POST['product_name'];
	$p_price=$_POST['product_price'];
	$p_qty=$_POST['product_qty'];
	$product_img=$_POST['product_img'];
    $product_desc=$_POST['product_desc'];
	$product_word=$_POST['product_word'];

	$sql_prod = "SELECT * FROM brands WHERE brand_title = '$brand'";
	// $run_query=mysqli_query($conn,$sql_prod);
	$run_query=odbc_exec($conn,$sql_prod);
	
	// while($row=mysqli_fetch_array($run_query)){
	// 	$brand_no=$row['brand_id'];
	// }
	while($row=odbc_fetch_array($run_query)){
		$brand_no=$row['brand_id'];
	}

	$sql_cat = "SELECT * FROM categories WHERE cat_title = '$category'";
	// $run_query=mysqli_query($conn,$sql_cat);
	$run_query=odbc_exec($conn,$sql_cat);
	
	// while($row=mysqli_fetch_array($run_query)){
	// 	$cat_no=$row['cat_id'];
	// }
	while($row=odbc_fetch_array($run_query)){
		$cat_no=$row['cat_id'];
	}
 						


	if(empty($brand) || empty($category) || empty($p_name) || empty($p_price) || empty($p_qty) || empty($product_img) || empty($product_desc) || empty($product_word)){
		echo "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Please fill all the fields!</div>";
		exit(0);
	}
	else{
		  $sql3="INSERT INTO products (product_cat,product_brand,product_title,product_price,product_qty,product_desc,product_image,product_keywords) VALUES ('$cat_no','$brand_no','$p_name','$p_price','$p_qty','$product_desc','$product_img','$product_word')";
					// $run_query3=mysqli_query($conn,$sql3);
					$run_query3=odbc_exec($conn,$sql3);
					if($run_query3){
						echo "
								<div class='alert alert-success' style='max-height:10%'>
									<p>product added</p>
								</div>
						";
					}
			
		}
	

	

	
 ?>