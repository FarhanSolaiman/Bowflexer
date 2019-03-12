<?php 
function getTitle() {
	// title
	echo "Olympic Archery || All Products";
}

function getExternal() { ?>
	<!-- externals -->
	<link rel="stylesheet" type="text/css" href="assets/css/nav.css">
	<link rel="stylesheet" type="text/css" href="assets/css/products.css">
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
	<div class="container-fluid my-4">
		<h1 class="head">ALL PRODUCTS</h1>
		<div class="btn-group" role="group">
		  <button type="button" class="btn btn-secondary" id="all">All</button>
		  <button type="button" class="btn btn-secondary" id="arrows">Arrows</button>
		  <button type="button" class="btn btn-secondary" id="stabilizers">Stabilizers</button>
		  <button type="button" class="btn btn-secondary" id="quivers">Quivers</button>
		  <button type="button" class="btn btn-secondary" id="bags">Bags</button>
		</div>
		<div class="btn-group" role="group">
		  <button type="button" class="btn btn-primary" id="highest">Price: Highest to Lowest</button>
		  <button type="button" class="btn btn-primary" id="lowest">Price: Lowest to Highest</button>
		</div>
		<div class="row m-1 productsall">
		<?php 
			$sql = "SELECT * FROM products";
			$all = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_assoc($all)) {
				$prodid = $row['id'];
				$name = $row['name']; 
				$price = $row['price']; 
				$pieces = $row['pieces']; 
				$image = $row['image'];
				?>
				<div class="col-lg-4 p-3">
					<div class="images">
						<img class="image my-3" src="<?php echo $image ?>">
					</div>
					<h4 class="head"><?php echo ucwords($name) ?></h4>
					<h6 class="big">&nbsp;$<?php echo $price ?></h6>
					<h6 class="big">&nbsp;<?php echo $pieces ?></h6>
					<input type="hidden" 	class="userid" value="<?php 
					if (isset($_SESSION['admin'])){
						$sql2 = "SELECT id FROM users WHERE username = '$_SESSION[admin]'";
						$results = mysqli_query($conn,$sql2);
						while ($row1 = mysqli_fetch_assoc($results)) {
								$id = $row1['id'];
							};
							echo $id;
					} 
					if (isset($_SESSION['logged_in_user'])){
						$sql2 = "SELECT id FROM users WHERE username = '$_SESSION[logged_in_user]'";
						$results = mysqli_query($conn,$sql2);
						while ($row1 = mysqli_fetch_assoc($results)) {
								$id = $row1['id'];
							};
							echo $id;
						} 
					?>">
					<input type="hidden" class="prodid" value="<?php echo $prodid ?>">
					<?php if (isset($_SESSION['logged_in_user'])){ ?>
						<button class="btn btn-danger mb-4 order" data-id="<?php echo $prodid ?>" data-user="<?php echo $_SESSION['usernum']; ?>">Add to cart</button><br>
					<?php } else {
						echo "";
					} ?>
					<span id="added<?php echo $prodid ?>"></span>
				</div>
			<?php } ?>
		</div>
	</div>

<?php } else {
	echo "<h3 style='text-align: center;'>YOU HAVE NO ACCESS TO THIS PAGE.<br>HEAD BACK TO THE PREVIOUS PAGE.</h3>";
} ?>
<?php } 

function getScript() { ?>
	<!-- script -->
	$(document).on('click','.order', function() {
		const id1 = $(this).data('id');
		const user1 = $(this).data('user');
	  $.ajax({
	    url: 'controllers/orders.php',
	    method: 'POST',
	    data: {
	    	users : user1,
	    	prodid : id1
	    },
	    <!--async: false-->
	  }).done(data => {
	    $('#added'+id1).css('color','green');
	    $('#added'+id1).html('Your item has been successfully added to the cart.');
	  });

	});

	$('#all').click( function() {
		 $('div.productsall').fadeOut("slow");
	  $.ajax({
	    url: 'controllers/sort.php',
	    method: 'POST',
	    data: {
	    	action: 'all'
	    },
	    async: false
	  }).done(data => {
	  	$('div.productsall').fadeOut("slow");
		 setTimeout(function(){
	  		$('div.productsall').fadeIn("slow").html(data);
	  	},500);
	 });

	});

	$('#arrows').click( function() {
	  $.ajax({
	    url: 'controllers/sort.php',
	    method: 'POST',
	    data: {
	    	action: 'arrows'
	    },
	    async: false
	  }).done(data => {
		 $('div.productsall').fadeOut("slow");
		 setTimeout(function(){
	  		$('div.productsall').fadeIn("slow").html(data);
	  	},500);
	 });

	});

		$('#stabilizers').click( function() {
	  $.ajax({
	    url: 'controllers/sort.php',
	    method: 'POST',
	    data: {
	    	action: 'stabilizer'
	    },
	    async: false
	  }).done(data => {
		 $('div.productsall').fadeOut("slow");
		 setTimeout(function(){
	  		$('div.productsall').fadeIn("slow").html(data);
	  	},500);
	 });

	});

		$('#quivers').click( function() {
	  $.ajax({
	    url: 'controllers/sort.php',
	    method: 'POST',
	    data: {
	    	action: 'quiver'
	    },
	    async: false
	  }).done(data => {
		 $('div.productsall').fadeOut("slow");
		 setTimeout(function(){
	  		$('div.productsall').fadeIn("slow").html(data);
	  	},500);
	 });

	});

		$('#bags').click( function() {
	  $.ajax({
	    url: 'controllers/sort.php',
	    method: 'POST',
	    data: {
	    	action: 'bag'
	    },
	    async: false
	  }).done(data => {
		 $('div.productsall').fadeOut("slow");
		 setTimeout(function(){
	  		$('div.productsall').fadeIn("slow").html(data);
	  	},500);
	 });

	});

	$('#lowest').click( function() {
	  $.ajax({
	    url: 'controllers/filter.php',
	    method: 'POST',
	    data: {
	    	action: 'lowest'
	    },
	    async: false
	  }).done(data => {
		 $('div.productsall').fadeOut("slow");
		 setTimeout(function(){
	  		$('div.productsall').fadeIn("slow").html(data);
	  	},500);
	 });

	});

	$('#highest').click( function() {
	  $.ajax({
	    url: 'controllers/filter.php',
	    method: 'POST',
	    data: {
	    	action: 'highest'
	    },
	    async: false
	  }).done(data => {
		 $('div.productsall').fadeOut("slow");
		 setTimeout(function(){
	  		$('div.productsall').fadeIn("slow").html(data);
	  	},500);
	 });

	});
<?php }

	require_once 'partials/template.php';
?>