<?php 

	require 'connection.php';

	$productid = $_POST['productid'];
	$productname = mysqli_escape_string($conn, $_POST['productname']);
	$productcategory = mysqli_escape_string($conn, $_POST['productcategories']);
	$productprice = $_POST['productprice'];
	$productstock = $_POST['productstock'];
	$productdescription = mysqli_escape_string($conn, $_POST['productdescription']);

	if ($productcategory == 1) {
		if (strlen($_FILES['productimage']['name']) == 0) {
			$sql = "UPDATE products SET name = '$productname', description = '$productdescription', price = '$productprice', stock = '$productstock', category_id = '$productcategory' WHERE id = '$productid'";

			mysqli_query($conn,$sql) OR DIE(mysqli_error($conn));
		} else {
			$productimage = "assets/images/arrows/".$_FILES['productimage']['name'];

			move_uploaded_file($_FILES['productimage']['tmp_name'], "../".$productimage);

			$sql = "UPDATE products SET name = '$productname', description = '$productdescription', price = '$productprice', stock = '$productstock', image = '$productimage', category_id = '$productcategory' WHERE id = '$productid'";

			mysqli_query($conn,$sql) OR DIE(mysqli_error($conn));
		}
	};

	if ($productcategory == 2) {
		if (strlen($_FILES['productimage']['name']) == 0) {
			$sql = "UPDATE products SET name = '$productname', description = '$productdescription', price = '$productprice', stock = '$productstock', category_id = '$productcategory' WHERE id = '$productid'";

			mysqli_query($conn,$sql) OR DIE(mysqli_error($conn));
		} else {
			$productimage = "assets/images/arrows/".$_FILES['productimage']['name'];

			move_uploaded_file($_FILES['productimage']['tmp_name'], "../".$productimage);

			$sql = "UPDATE products SET name = '$productname', description = '$productdescription', price = '$productprice', stock = '$productstock', image = '$productimage', category_id = '$productcategory' WHERE id = '$productid'";

			mysqli_query($conn,$sql) OR DIE(mysqli_error($conn));
		}
	};

	if ($productcategory == 3) {
		if (strlen($_FILES['productimage']['name']) == 0) {
			$sql = "UPDATE products SET name = '$productname', description = '$productdescription', price = '$productprice', stock = '$productstock', category_id = '$productcategory' WHERE id = '$productid'";

			mysqli_query($conn,$sql) OR DIE(mysqli_error($conn));
		} else {
			$productimage = "assets/images/arrows/".$_FILES['productimage']['name'];

			move_uploaded_file($_FILES['productimage']['tmp_name'], "../".$productimage);

			$sql = "UPDATE products SET name = '$productname', description = '$productdescription', price = '$productprice', stock = '$productstock', image = '$productimage', category_id = '$productcategory' WHERE id = '$productid'";

			mysqli_query($conn,$sql) OR DIE(mysqli_error($conn));
		}
	};

	if ($productcategory == 4) {
		if (strlen($_FILES['productimage']['name']) == 0) {
			$sql = "UPDATE products SET name = '$productname', description = '$productdescription', price = '$productprice', stock = '$productstock', category_id = '$productcategory' WHERE id = '$productid'";

			mysqli_query($conn,$sql) OR DIE(mysqli_error($conn));
		} else {
			$productimage = "assets/images/arrows/".$_FILES['productimage']['name'];

			move_uploaded_file($_FILES['productimage']['tmp_name'], "../".$productimage);

			$sql = "UPDATE products SET name = '$productname', description = '$productdescription', price = '$productprice', stock = '$productstock', image = '$productimage', category_id = '$productcategory' WHERE id = '$productid'";

			mysqli_query($conn,$sql) OR DIE(mysqli_error($conn));
		}
	};

	header('location: productlist.php');
 ?>