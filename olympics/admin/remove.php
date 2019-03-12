<?php 

	require 'connection.php';

	$action = $_GET['action'];

	if ($action == 'product') {

		$id = $_GET['prodid'];

		$sql = "DELETE FROM products WHERE id = $id";

		$result = mysqli_query($conn,$sql) OR DIE(mysqli_error($conn));
	
	header('location: productlist.php');
	}

	if ($action == 'user') {

		$id = $_GET['userid'];

		$sql = "DELETE FROM users WHERE id = $id";

		$result = mysqli_query($conn,$sql) OR DIE(mysqli_error($conn));
	
	header('location: users.php');
	}


 ?>