<?php require "connection.php";

	$order = $_POST['prodid'];
	$user = $_POST['users'];



	$sql = "SELECT * FROM order1 WHERE user_id = $user AND product_id = $order";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	if (mysqli_num_rows($result) > 0) {
	
	$product_id = $row['product_id'];
	$user_id = $row['user_id'];

		$update = "UPDATE order1 SET quantity=quantity + 1 WHERE product_id = $order AND user_id = $user";
		mysqli_query($conn,$update);

	} else {

		$insert = "INSERT INTO order1(quantity,product_id,user_id) VALUES (1,'$order','$user')";
		mysqli_query($conn,$insert);			
	};

?>