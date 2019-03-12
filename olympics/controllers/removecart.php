<?php 
	require "connection.php";

	$action = $_POST['action'];

	// remove product
	if ($action == 'removeprod') {
		$id = $_POST['id'];
		$user_id = $_POST['user'];

	$sql = "DELETE FROM order1 WHERE product_id = $id AND user_id = $user_id";

	mysqli_query($conn, $sql);
	}

	// remove all products
	if ($action == 'removeall') {

		$user_id = $_POST['user'];

		$sql = "DELETE FROM order1 WHERE user_id = $user_id";
	
		mysqli_query($conn, $sql);	
	}

?>