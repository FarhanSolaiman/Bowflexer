<?php 
	require "connection.php";

	$quantity = $_POST['quantity'];
	$id = $_POST['id'];
	$user_id = $_POST['user'];

	$sql = "UPDATE order1 SET quantity = $quantity WHERE product_id = $id AND user_id = $user_id";

	mysqli_query($conn, $sql);

?>