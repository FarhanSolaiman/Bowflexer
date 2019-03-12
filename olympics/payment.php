<?php 
function getTitle() {
	// title
	echo "Olympic Archery || Payment";
}

function getExternal() { ?>
	<!-- externals -->
	<link rel="stylesheet" type="text/css" href="assets/css/nav.css">
	<link rel="stylesheet" type="text/css" href="assets/css/payment.css">
	<link rel="stylesheet" type="text/css" href="assets/css/footer.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed:700" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/icofont.css">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon.png">
<?php
}

function getContent() { ?>
	<?php require 'controllers/connection.php' ?>
	<!-- content -->
<?php if (isset($_SESSION['logged_in_user']) OR isset($_SESSION['admin'])){ ?>
	<div class="container-fluid">
		<h1 class="head">CHECKOUT</h1>
			<div class="col-lg-12 p-2">
				<div class="productlist">
					<table class="table table-striped">
						<thead>
							<tr>
							<th class="product-image">Image</th>
							<th class="product-details">Product</th>
							<th class="product-details">Description</th>
							<th class="product-price">Price</th>
							<th class="product-quantity">Quantity</th>
							<th class="product-line-price">Total</th>
							</tr>
						</thead>
						<tbody>

		<?php if (isset($_SESSION['adminnum'])) {
			$sql = "SELECT p.name,p.image,p.description,p.price FROM products p 
			JOIN order1 o ON (p.id = o.product_id)
			JOIN users u ON (u.id = o.user_id)
			WHERE o.user_id = '$_SESSION[adminnum]'";

			$find = mysqli_query($conn,$sql);

			while($row = mysqli_fetch_assoc($find)) {
				$name = $row['name']; 
				$price = $row['price'];
				$desc = $row['description']; 
				$image = $row['image']; ?>

				<tr class="product">
					<td class="product-image">
						<img src="<?php echo $image ?>">
					</td>
					<td class="product-title"><?php echo $name; ?></td>
					<td class="product-details">
					</td>
					<td class="product-price"><?php echo $price; ?></td>
					<td class="product-quantity">
						<input type="number" name="quantity" value="1" min="1">
					</td>
					<td class="product-line-price"><?php echo $price; ?></td>
				</tr>
			<?php 	}
			};
		if (isset($_SESSION['usernum'])) {
			$sql = "SELECT p.name,p.image,p.description,p.price,o.quantity FROM products p 
			JOIN order1 o ON (p.id = o.product_id)
			JOIN users u ON (u.id = o.user_id)
			WHERE o.user_id = '$_SESSION[usernum]'";

			$find = mysqli_query($conn,$sql);

			$totals = 0;
			$tax = 0.05;
			$subtax = 0;
			$ship = 15;
			while($row = mysqli_fetch_assoc($find)) {
				$name = $row['name']; 
				$price = $row['price'];
				$desc = $row['description']; 
				$image = $row['image'];
				$quantity = $row['quantity'];
				?>
				<tr class="product">
					<td class="product-image">
						<img src="<?php echo $image ?>">
					</td>
					<td class="product-title"><?php echo $name; ?></td>
					<td class="product-details"><p class="product-description"><?php echo $desc; ?></p></td>
					<td class="product-price">$<?php echo $price; ?></td>
					<td class="product-quantity"><p><?php echo $quantity; ?></p></td>
					<td class="product-line-price">$<?php $total =$price * $quantity; echo $total; ?></td>
				</tr>

			<?php $totals += $total; }
			};
		?>	<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td class="text">Total:</td>
				<td class="product-line-price text">$<?php echo $totals; ?></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td class="text">Tax:</td>
				<td class="product-line-price text">$<?php $subtax = number_format((float)$totals * $tax, 2, '.', ''); echo $subtax; ?></td>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td class="text">Shipping:</td>
				<td class="product-line-price text">$<?php echo number_format((float)$ship, 2, '.', '');?></td>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td class="text">Grand Total:</td>
				<td class="product-line-price text">$<?php $totality = number_format((float)$totals + $subtax + $ship, 2, '.', ''); echo $totality;?></td>
			</tr>

						</tbody>
					</table>
				</div>
			</div>
			<div class="ml-0 row">
				
					<div class="col-lg-6 p-2">
						<div class="userdetails">
							<div class="row m-0 p-2 my-2">
								<h3 class="head ml-3">Information</h3>
								<p class="ml-3 pt-2" style="color: red;text-align: justify;font-weight: bold;">*If you are paying Cash on Delivery, please fill out this form*</p>
								<div class="col-lg-12">
									<h5>Name: *</h5>
									<input type="text" class="form-control" name="fullname" id="fullname" required>
								</div>
								<div class="col-lg-12">
									<h5>Email-Address:</h5>
									<input type="text" id="email" class="form-control" name="email">
								</div>
								<div class="col-lg-6">
									<h5>Address: *</h5>
									<input type="text" class="form-control" id="address" name="address" required>
								</div>
								<div class="col-lg-3">
									<h5>Street:</h5>
									<input type="text" id="street" class="form-control" autocomplete="hidden" name="street" required>
								</div>
								<div class="col-lg-3">
									<h5>Postal Code: *</h5>
									<input type="text" class="form-control" id="pcode" name="pcode" required>
								</div>
								<div class="col-lg-12">
									<h5>Mobile Number:</h5>
									<input type="number" id="contact" class="form-control" name="contact">
								</div>
								<p class="ml-3" id="unfill"></p>
							</div>
						</div>
						
					</div>
				<div class="col-lg-6 p-2">
					<div class="paymentmet">
						<div class="row m-0 p-2 my-2">
							<h3 class="head ml-3">Payment</h3>
							<div class="col-lg-12">
								<p style="color: red;text-align: justify;font-weight: bold;">*Please be reminded that this website is for training purposes only. Putting your personal account here means that you are willing to put your personal data here.*</p>
							</div>
							<div class="col-lg-12" id="buttons">
								<button class="mx-5" type="button" id="but">Cash on Delivery</button>
								<a href="controllers/paypalcheckout.php"><button class="mx-5" type="button" id="but2">Paypal</button></a>
							</div>
							<h5 class="head" id="success"></h5>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php } else {
	echo "<h3 style='text-align: center;'>YOU HAVE NO ACCESS TO THIS PAGE.<br>HEAD BACK TO THE PREVIOUS PAGE.</h3>";
} ?>
<?php } 

function getScript() { ?>
$('#but').click( () => {
	let fullname = $('#fullname').val();
	let address = $('#address').val();
	let pcode = $('#pcode').val();
	let error_flag = false;

    if(fullname.length == 0){
  		$('#unfill').css('color','red');
  		$('#unfill').html('A field is required.');
  		error_flag=true;
 	 	}
 	 	if (address.length == 0){
  		$('#unfill').css('color','red');
  		$('#unfill').html('A field is required.');
  		error_flag=true;
 	 	}
 	  if(pcode.length == 0){
  		$('#unfill').css('color','red');
  		$('#unfill').html('A field is required.');
  		error_flag=true;
 	 	}

 	 	if (error_flag == false){
 	 	$('#unfill').html('');
 	 	$.ajax({
			    url: 'controllers/cashon.php',
			    method: 'POST',
			    data: {
			    	fullname : fullname,
			    	address : address,
			    	pcode : pcode
			    },
			    async: false
			  }).done( data => {
			  		$('#success').css('color','green');
			  		$('#success').addClass('mt-3 ml-auto mr-auto');
			  		$('#success').html('You have successfully bought the products. Have a nice day.');
			  	setTimeout( () => {
			  		$('#success').html('');
			  		window.location.href = 'index.php';
			  	}, 3000);
			});
		}
	});
 
<?php }

	require_once 'partials/template.php';
?>