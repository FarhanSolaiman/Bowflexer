<?php session_start();

	use PayPal\Api\Payment;
	use PayPal\Api\PaymentExecution;

	require 'startpaypal.php';
	require 'connection.php';



	if (!isset(($_GET['success']), $_GET['paymentId'], $_GET['PayerID'])) {
		die();
	}

	if ((bool)$_GET['success']==false) {
		echo "Transaction cancelled. <a href='../index.php'> Go back to Bowflexer.</a>"; die();
	}


	$payment_id = $_GET['paymentId'];
	$payer_id = $_GET['PayerID'];

	$payment = Payment::get($payment_id, $paypal);
	$execute = new PaymentExecution();
	$execute->setPayerId($payer_id);

	// transaction code
	$invoicenum = $payment->getTransactions()[0]->getInvoiceNumber();

	$shipping_address_array = json_decode($payment->getTransactions()[0]->getItemList()->getShippingAddress());
	

	// name
	$fullname = '';
	foreach ($shipping_address_array as $key => $name) {
		if ($key == 'recipient_name') {
			$fullname = $name;
		}
	}


	// address	
	$address = '';
	foreach ($shipping_address_array as $key => $address_piece) {
		if ($key != 'recipient_name' AND $key != 'postal_code') {
			$address .= $address_piece." ";
		}
	}


	// postalcode
	$pcode = '';
	foreach ($shipping_address_array as $key => $postal) {
		if ($key == 'postal_code') {
			$pcode = $postal;
		}
	}


	// userid
	$user_id = $_SESSION['usernum'];

	// date
	date_default_timezone_set('Asia/Manila');
	$date = date("Y-m-d H:i:sa");


	// query1
	$sql= "INSERT INTO order_detail1(user_id,full_name,email,delivery_address,postal_code,contact_number,transaction_code,status_id,date_created,payment_method_id) VALUES ('$user_id','$fullname',NULL,'$address','$pcode',NULL,'$invoicenum',1,'$date',2)";

	mysqli_query($conn,$sql) or die(mysqli_error($conn));

	// query2
	$sql2 = "SELECT p.name,p.image,p.price,o.quantity,p.id prodid,u.id userid,ords.id orderid FROM products p 
			JOIN order1 o ON (p.id = o.product_id)
			JOIN users u ON (u.id = o.user_id)
			JOIN order_detail1 ords ON (u.id = ords.user_id)
			WHERE o.user_id = '$user_id' AND ords.transaction_code = '$invoicenum'";
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
				
	// query3
	$sql4 = "DELETE FROM order1 WHERE user_id = '$user_id'";
	mysqli_query($conn,$sql4) or die(mysqli_error($conn));

    header('location: ../index.php');
?>