<?php 

	use PayPal\Api\Payer;
	use PayPal\Api\Item;
	use PayPal\Api\ItemList;
	use PayPal\Api\Details;
	use PayPal\Api\Amount;
	use PayPal\Api\Transaction;
	use PayPal\Api\RedirectUrls;
	use PayPal\Api\Payment;

	require "startpaypal.php";

	$payer = new Payer();
	$payer->setPaymentMethod('paypal');

	session_start();
	require 'connection.php';

    
	$items = [];
	$total = 0;

			$sql = "SELECT p.name,p.image,p.description,p.price,o.quantity FROM products p 
			JOIN order1 o ON (p.id = o.product_id)
			JOIN users u ON (u.id = o.user_id)
			WHERE o.user_id = '$_SESSION[usernum]'";

			$find = mysqli_query($conn,$sql);

			$totals = 0;
			$tax = 0.05;
			$ship = 15;
			while($row = mysqli_fetch_assoc($find)) {
				$name = $row['name']; 
				$price = $row['price'];
				$desc = $row['description'];
				$quantity = $row['quantity'];
				$total = $row['price'] * $row['quantity'];
				$item = new Item();
				$item->setName($name)
					->setCurrency('USD')
					->setQuantity($quantity)
					->setPrice($price);

				array_push($items,$item);
				$totals += $total;
			}
			$taxed = $totals * $tax;

				$item = new Item();
				$item->setName('Tax')
					->setCurrency('USD')
					->setQuantity(1)
					->setPrice($taxed);
					
				array_push($items,$item);
				$item = new Item();
				$item->setName('Shipping Fee')
					->setCurrency('USD')
					->setQuantity(1)
					->setPrice($ship);
					
				array_push($items,$item);

			$grandtotal = $totals + $taxed + $ship;
$item_list = new ItemList();
$item_list->setItems($items);

	$amount = new Amount();
	$amount->setCurrency('USD')
		->setTotal($grandtotal);

	$transaction = new Transaction();
	$transaction->setAmount($amount)
		->setItemList($item_list)
		->setDescription('Payment for Bowflexer Products.')
		->setInvoiceNumber(uniqid('bowflexer'));

	$redirectUrls = new RedirectUrls();
	$redirectUrls->setReturnUrl(SITE_URL.'controllers/pay.php?success=true')
		->setCancelUrl(SITE_URL.'controllers/pay.php?success=false');

	$payment = new Payment();
	$payment->setIntent('sale')
		->setPayer($payer)
		->setRedirectUrls($redirectUrls)
		->setTransactions([$transaction]);

	try {
		$payment->create($paypal);
	} catch(Exception $e) {
		die($e);
	}

	$approvalUrl = $payment->getApprovalLink();

	header('location: '.$approvalUrl);
 ?>