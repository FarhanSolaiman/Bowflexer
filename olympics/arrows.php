<?php 
function getTitle() {
	// title
	echo "Olympic Archery || Arrows";
}

function getExternal() { ?>
	<!-- externals -->
	<link rel="stylesheet" type="text/css" href="assets/css/nav.css">
	<link rel="stylesheet" type="text/css" href="assets/css/arrows.css">
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
		<h1 class="head">ARROWS</h1>
		<?php 
			$sql = "SELECT id,name,price,description,image,pieces FROM products WHERE category_id = 1";
			$all = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_assoc($all)) {
				$prodid = $row['id'];
				$name = $row['name']; 
				$price = $row['price']; 
				$desc = $row['description']; 
				$image = $row['image'];
				$piece = $row['pieces'];
				?>
				<div class="container-fluid">
				<img class="image my-3" src="<?php echo $image ?>">
				<span id="added<?php echo $prodid ?>"></span>
				<h2 class="head"><?php echo ucwords($name) ?></h2>
				<h5 class="big">&nbsp;$<?php echo $price ?> / <?php echo $piece ?></h5><br>
				<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $desc ?></h4>
				<input type="hidden" class="userid" value="<?php 
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
				<button class="btn btn-danger mb-4 order">Add to cart</button>
			<?php } else {
				echo "";
			} ?>
				<img class="break" src="assets/images/break.png">
				</div>
			<?php } ?>
	</div>

<?php } else {
	echo "<h3 style='text-align: center;'>YOU HAVE NO ACCESS TO THIS PAGE.<br>HEAD BACK TO THE PREVIOUS PAGE.</h3>";
} ?>
<?php } 

function getScript() { ?>
	<!-- script -->
	$('.order').click( function() {
		const id1 = $(this).closest('div').find('input.prodid').val();
		const user1 = $(this).closest('div').find('input.userid').val();
	  $.ajax({
	    url: 'controllers/orders.php',
	    method: 'POST',
	    data: {
	    	users : user1,
	    	prodid : id1
	    },
	    async: false
	  }).done(data => {
	    $('#added'+id1).css('color','green');
	    $('#added'+id1).html('Your item has been successfully added to the cart.');
	  });

	});
<?php }

	require_once 'partials/template.php';
?>