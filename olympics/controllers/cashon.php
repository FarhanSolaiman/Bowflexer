<?php require "connection.php";
session_start();

	$name = $_POST['fullname'];
	$address = $_POST['address'];
	$pcode = $_POST['pcode'];
	$invoice = uniqid('bowflexer');
	$user_id = $_SESSION['usernum'];
	date_default_timezone_set('Asia/Manila');
	$date = date("Y-m-d H:i:sa");

	$sql = "INSERT INTO order_detail1(user_id,full_name,email,delivery_address,postal_code,contact_number,transaction_code,status_id,date_created,payment_method_id) VALUES ('$user_id','$name',NULL,'$address','$pcode',NULL,'$invoice',1,'$date',1)";

	mysqli_query($conn,$sql)  or die(mysqli_error($conn));

	$sql2 = "SELECT p.name,p.image,p.price,o.quantity,p.id prodid,u.id userid,ords.id orderid FROM products p 
			JOIN order1 o ON (p.id = o.product_id)
			JOIN users u ON (u.id = o.user_id)
			JOIN order_detail1 ords ON (o.user_id = ords.user_id)
			WHERE o.user_id = '$user_id' AND ords.transaction_code = '$invoice'";
	$find = mysqli_query($conn,$sql2);

			while($row = mysqli_fetch_assoc($find)) {
				$name = $row['name']; 
				$price = $row['price']; 
				$image = $row['image'];
				$prod_id = $row['prodid'];
				$users_id = $row['userid'];
				$od_id = $row['orderid'];
				$quantity = $row['quantity'];
				$total = $price * $quantity;
	$sql3 = "INSERT INTO order2(prod_name,image,total,quantity,date_bought,price,product_id,user_id,order_detail_id) VALUES ('$name','$image','$total','$quantity','$date','$price','$prod_id','$users_id','$od_id')";
		mysqli_query($conn,$sql3) or die(mysqli_error($conn));
	}

	$sql4 = "DELETE FROM order1 WHERE user_id = '$user_id'";
	mysqli_query($conn,$sql4) or die(mysqli_error($conn));
?>