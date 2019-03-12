<?php 

	require 'connection.php';

	$productname = mysqli_escape_string($conn, $_POST['productname']);
	$productcategory = mysqli_escape_string($conn, $_POST['productcategories']);
	$productprice = $_POST['productprice'];
	$productstock = $_POST['productstock'];
	$productdescription = mysqli_escape_string($conn, $_POST['productdescription']);
	$stock = 'assets/images/logo-top.png';

	if ($productcategory == 1) {
	    if (strlen($_FILES['productimage']['name']) == 0) {
			$sql = "INSERT INTO products(name,description,price,stock,image,category_id) VALUES ('$productname','$productdescription',$productprice,$productstock,'$stock',$productcategory)";
	
			$result = mysqli_query($conn, $sql);
		} else {
		    
		$productimage = "assets/images/arrows/".$_FILES['productimage']['name'];

	    move_uploaded_file($_FILES['productimage']['tmp_name'], "../".$productimage);

	    $sql = "INSERT INTO products(name,description,price,stock,image,category_id) VALUES ('$productname','$productdescription',$productprice,$productstock,'$productimage',$productcategory)";

	    mysqli_query($conn,$sql) OR DIE(mysqli_error($conn));
	    }
	}

	if ($productcategory == 2) {
	    if (strlen($_FILES['productimage']['name']) == 0) {
			$sql = "INSERT INTO products(name,description,price,stock,image,category_id) VALUES ('$productname','$productdescription',$productprice,$productstock,'$stock',$productcategory)";
	
			$result = mysqli_query($conn, $sql);
		} else {
		    
		$productimage = "assets/images/stabilizers/".$_FILES['productimage']['name'];

	    move_uploaded_file($_FILES['productimage']['tmp_name'], "../".$productimage);

	    $sql = "INSERT INTO products(name,description,price,stock,image,category_id) VALUES ('$productname','$productdescription',$productprice,$productstock,'$productimage',$productcategory)";

	    mysqli_query($conn,$sql) OR DIE(mysqli_error($conn));
	    }
	}
	
	if ($productcategory == 3) {
	    if (strlen($_FILES['productimage']['name']) == 0) {
			$sql = "INSERT INTO products(name,description,price,stock,image,category_id) VALUES ('$productname','$productdescription',$productprice,$productstock,'$stock',$productcategory)";
	
			$result = mysqli_query($conn, $sql);
		} else {
		    
		$productimage = "assets/images/bags/".$_FILES['productimage']['name'];

	    move_uploaded_file($_FILES['productimage']['tmp_name'], "../".$productimage);

	    $sql = "INSERT INTO products(name,description,price,stock,image,category_id) VALUES ('$productname','$productdescription',$productprice,$productstock,'$productimage',$productcategory)";

	    mysqli_query($conn,$sql) OR DIE(mysqli_error($conn));
	    }
	}
	
	if ($productcategory == 4) {
	   if (strlen($_FILES['productimage']['name']) == 0) {
			$sql = "INSERT INTO products(name,description,price,stock,image,category_id) VALUES ('$productname','$productdescription',$productprice,$productstock,'$stock',$productcategory)";
	
			$result = mysqli_query($conn, $sql);
		} else {
		    
		$productimage = "assets/images/quivers/".$_FILES['productimage']['name'];

	    move_uploaded_file($_FILES['productimage']['tmp_name'], "../".$productimage);

	    $sql = "INSERT INTO products(name,description,price,stock,image,category_id) VALUES ('$productname','$productdescription',$productprice,$productstock,'$productimage',$productcategory)";

	    mysqli_query($conn,$sql) OR DIE(mysqli_error($conn));
	    }
	}
	
	header('location: index.php');
 ?>