<?php 
function getTitle() {
	// title
	echo "Olympic Archery || Cart";
}

function getExternal() { ?>
	<!-- externals -->
	<link rel="stylesheet" type="text/css" href="assets/css/nav.css">
	<link rel="stylesheet" type="text/css" href="assets/css/cart.css">
	<link rel="stylesheet" type="text/css" href="assets/css/footer.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed:700" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/icofont.css">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon.png">
	<?php
}

function getContent() { ?>
	<?php require 'controllers/connection.php' ?>
	<!-- content -->
<?php if (isset($_SESSION['logged_in_user']) OR isset($_SESSION['admin'])){ ?>
	<div class="shopping-cart container-fluid my-4">
		<h1 class="head">Shopping Cart</h1>

		<div class="column-labels">
			<label class="product-image">Image</label>
			<label class="product-details">Product</label>
			<label class="product-price">Price</label>
			<label class="product-quantity">Quantity</label>
			<label class="product-removal">Remove</label>
			<label class="product-line-price">Total</label>
		</div>

		<?php 
			$ship = 15;
		if (isset($_SESSION['adminnum'])) {
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

				<div class="product">
					<div class="product-image">
						<img src="<?php echo $image ?>">
					</div>
					<div class="product-details">
						<div class="product-title"><?php echo $name; ?></div>
						<p class="product-description"><?php echo $desc; ?></p>
					</div>
					<div class="product-price"><?php echo $price; ?></div>
					<div class="product-quantity">
						<input type="number" name="quantity" value="1" min="1">
					</div>
					<div class="product-removal">
						<a href="/"><button class="remove-product">Remove</button></a>
					</div>
					<div class="product-line-price"><?php echo $price; ?></div>
				</div>
			<?php 	}
			};
		if (isset($_SESSION['usernum'])) {
			$sql = "SELECT p.id,p.name,p.image,p.description,p.price,o.quantity FROM products p 
			JOIN order1 o ON (p.id = o.product_id)
			JOIN users u ON (u.id = o.user_id)
			WHERE o.user_id = '$_SESSION[usernum]'";

			$find = mysqli_query($conn,$sql);

			$totals = 0;
			$tax = 0.05;
			$subtax = 0;
			while($row = mysqli_fetch_assoc($find)) {
				$name = $row['name']; 
				$price = $row['price'];
				$desc = $row['description']; 
				$image = $row['image'];
				$quantity = $row['quantity'];
				$id = $row['id'];
				?>
				<div class="product" id="product<?php echo $id; ?>">
				<div class="product-image">
					<img src="<?php echo $image ?>">
				</div>
				<div class="product-details">
					<div class="product-title"><?php echo $name; ?></div>
					<p class="product-description"><?php echo $desc; ?></p>
				</div>
				<div class="product-price"><?php echo $price; ?></div>
				<div class="product-quantity">
					<input type="number" data-id="<?php  echo $id; ?>" data-user="<?php echo $_SESSION['usernum'] ?>" class="quantity number" name="quantity number" value="<?php echo $quantity; ?>" min="1">
				</div>
				<div class="product-removal">
					<a href="#" class="removebut" data-toggle="modal" data-target="#removeprod<?php echo $id; ?>" data-id="<?php echo $id; ?>" data-user="<?php echo $_SESSION['usernum'] ?>"><button class="btn remove-product">Remove</button></a>
				</div>
				<div class="product-line-price"><?php $total =$price * $quantity; echo $total; ?></div>
		

				<div class="modal fade" id="removeprod<?php echo $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content" id="removeprod3">
							<div class="modal-header">
								<h4 class="head">REMOVE PRODUCT</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button></div>
								<div class="modal-body">
									<h4 class="mb-3">Are you sure you want to remove this product?</h4>
									<button type="button" class="btn btn-success mr-3 remove4" data-id="<?php echo $id ?>" data-user="<?php echo $_SESSION['usernum'] ?>">Yes</button><button type="button" class="btn btn-danger no" data-dismiss="modal">No</button>
								</div>
							</div>
						</div>
					</div>
			</div>
		

			<?php $totals += $total; 
			}
			};
		?>
			<input type="hidden" id="userid" value="<?php 
			if (isset($_SESSION['adminnum'])) {	
				echo $_SESSION['adminnum']; 
			}
			if (isset($_SESSION['usernum'])) {	
				echo $_SESSION['usernum']; 
			}
			?>">
			<div class="totals">
				<?php if ($totals == 0) {
					echo "";
				} else { ?>
				<a class="float-right" href="#" data-toggle="modal" data-target="#removeall"><button class="btn btn-sm btn-danger" id="removeall1">REMOVE ALL PRODUCTS</button></a>
			<?php } ?>
				<br><br>
				<div class="totals-item">
					<label>Subtotal</label>
					<div class="totals-value" id="cart-subtotal"><?php echo number_format((float)$totals, 2, '.', ''); ?></div>
				</div>
				<div class="totals-item">
					<label>Tax (5%)</label>
					<div class="totals-value" id="cart-tax"><?php $subtax = number_format((float)$totals * $tax, 2, '.', ''); echo $subtax; ?></div>
				</div>
				<div class="totals-item">
					<label>Shipping</label>
					<div class="totals-value" id="cart-shipping"><?php echo number_format((float)$ship, 2, '.', '');?></div>
				</div>
				<div class="totals-item totals-item-total">
					<label>Grand Total</label>
					<div class="totals-value" id="cart-total"><?php $totality = number_format((float)$totals + $subtax + $ship, 2, '.', ''); echo $totality;?></div>
					<?php if ($totals == 0) { ?>
						<button class="btn btn-lg" id="checkout" disabled>Checkout</button>
					<?php } else { ?>
					<a href="#" class="checkout1" data-toggle="modal" data-target="#checkout3"><button class="btn btn-lg" id="checkout">Checkout</button></a>
				<?php } ?>
				</div>
			</div>


		</div>

		<!-- checkout modal -->
		<div class="modal fade" id="checkout3" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content" id="checkout4">
					<div class="modal-header">
						<h4 class="head">CHECKOUT</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button></div>
						<div class="modal-body">
							<h4 class="mb-3">Are you sure you want to buy the following items totaling to $<span id="totalprice"></span>?</h4>
							<a href="payment.php"><button type="button" class="btn btn-success mr-3">Yes</button></a><button type="button" class="btn btn-danger" data-dismiss="modal">No</button>	
						</div>
					</div>
				</div>
			</div>

			<!-- remove all modal -->
			<div class="modal fade" id="removeall" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content" id="removeall2">
					<div class="modal-header">
						<h4 class="head">REMOVE ALL PRODUCTS</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button></div>
						<div class="modal-body">
							<h4 class="mb-3">Are you sure you want to remove all products?</h4>
							<button type="button" class="btn btn-success mr-3 removeall" data-user="<?php echo $_SESSION['usernum'] ?>">Yes</button><button type="button" class="btn btn-danger no" data-dismiss="modal">No</button>
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
		<!-- script -->
		$('.number').keyup(function(e) {
	        if ($(this).val() < 1) {
	        $(this).val('1');
	        }
	    });
		
		$('.quantity').bind('keyup mouseup', function(){
			let quantity = $(this).val();
			let id = $(this).data('id');
			let user = $(this).data('user');

			$.ajax({
			    url: 'controllers/checkout.php',
			    method: 'POST',
			    data: {
			    	quantity : quantity,
			    	id : id,
			    	user : user
			    },
			    async: false
			  });
		});

		$('.removebut').click( function() {
			let id2 = $(this).data('id');
			let user2 = $(this).data('user');
		});

		$('.remove4').click( function() {
			let id = $(this).data('id');
			let user = $(this).data('user');
			$.ajax({
			    url: 'controllers/removecart.php',
			    method: 'POST',
			    data: {
			    	action : 'removeprod',
			    	id : id,
			    	user : user
			    },
			    async: false
			  }).done( function() {
			  	$('.no').click();
			  	$('div#product'+id).remove();
			  	$('.modal-backdrop').remove();
			  	$('body').removeClass('modal-open');
			  	$('body').removeAttr('style');
			  	recalculateCart();
				});
		});

		$('.removeall').click( function() {
			let user = $(this).data('user');
			$.ajax({
			    url: 'controllers/removecart.php',
			    method: 'POST',
			    data: {
			    	action : 'removeall',
			    	user : user
			    },
			    async: false
			  }).done( function(data) {
			  	console.log(data);
			  	$('.no').click();
			  	$('div.product').remove();
			  	$('.modal-backdrop').remove();
			  	$('body').removeClass('modal-open');
			  	$('body').removeAttr('style');
                $('#checkout').attr('disabled',true);
			  	$('#removeall1').hide();
			  	recalculateCart();
				});
		});


		$('.checkout1').click( () => {
			let total = $('div#cart-total').html();
			$('#totalprice').html(total);
		});


		/* Set rates + misc */
		var taxRate = 0.05;
		var shippingRate = 15.0;
		var fadeTime = 300;


		/* Assign actions */
		$(".product-quantity input").change(function() {
		updateQuantity(this);
	});

/* Recalculate cart */
function recalculateCart() {
var subtotal = 0;

/* Sum up row totals */
$(".product").each(function() {
subtotal += parseFloat($(this).children(".product-line-price").text());
});

/* Calculate totals */
var tax = subtotal * taxRate;
var shipping = subtotal > 0 ? shippingRate : 15;
var total = subtotal + tax + shipping;

/* Update totals display */
$(".totals-value").fadeOut(fadeTime, function() {
$("#cart-subtotal").html(subtotal.toFixed(2));
$("#cart-tax").html(tax.toFixed(2));
$("#cart-shipping").html(shipping.toFixed(2));
$("#cart-total").html(total.toFixed(2));
if (total == 0) {
$(".checkout").fadeOut(fadeTime);
} else {
$(".checkout").fadeIn(fadeTime);
}
$(".totals-value").fadeIn(fadeTime);
});
}

/* Update quantity */
function updateQuantity(quantityInput) {
/* Calculate line price */
var productRow = $(quantityInput)
.parent()
.parent();
var price = parseFloat(productRow.children(".product-price").text());
var quantity = $(quantityInput).val();
var linePrice = price * quantity;

/* Update line price display and recalc cart totals */
productRow.children(".product-line-price").each(function() {
$(this).fadeOut(fadeTime, function() {
$(this).text(linePrice.toFixed(2));
recalculateCart();
$(this).fadeIn(fadeTime);
});
});
}

<?php } require_once 'partials/template.php' ?>