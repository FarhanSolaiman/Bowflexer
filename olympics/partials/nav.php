<nav class="navbar navbar-expand-lg navbar-light" id="navbar1">
	<a class="navbar-brand" id="navbar-pic" href="index.php"><img src="assets/images/logo-top.png"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavDropdown">
		<ul class="navbar-nav ml-auto margin">
			<li class="nav-item active">
				<a class="nav-link items" href="index.php">HOME</a>
			</li>
			<?php if (isset($_SESSION['logged_in_user']) OR isset($_SESSION['admin'])) { ?>
			<li class="nav-item dropdown">
        		<a class="nav-link items" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SHOP</a>
	        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	          		<a class="dropdown-item" href="arrows.php">Arrows</a>
	          		<a class="dropdown-item" href="stabilizers.php">Stabilizers</a>
	          		<a class="dropdown-item" href="products.php">All Products</a>
	        	</div>
      		</li>
			<?php } else {
				echo " ";
			} ?>
				
      		<li class="nav-item">
				<a class="nav-link items" href="about.php">ABOUT</a>
			</li>
      		<li class="nav-item dropdown">
        		<a class="nav-link items" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CONTACT</a>
	        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	          		<a class="dropdown-item" href="contact.php">Location</a>
	          		<a class="dropdown-item" href="contact.php#contact">Contact Information</a>
	          		<a class="dropdown-item" href="contact.php#message">Message us</a>
	          		<a class="dropdown-item" href="faqs.php">FAQ</a>
	        	</div>
      		</li>
      		<?php if (isset($_SESSION['admin'])) { ?>
			<li class="nav-item dropdown">
        		<a class="nav-link items" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ADMIN</a>
	        	<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	          		<a class="dropdown-item" href="admin/index.php">Add Items</a>
	          		<a class="dropdown-item" href="admin/productlist.php">See Item list</a>
	          		<a class="dropdown-item" href="admin/users.php">See Users</a>
	          		<a class="dropdown-item" href="admin/orders.php">Orders</a>
	        	</div>
      		</li>
			<?php } else {
				echo " ";
			} ?>
      		<?php if (isset($_SESSION['logged_in_user'])) { ?>
      		<li class="nav-item cart">
				<a class="nav-link items" href="cart.php"><i class="icofont-shopping-cart"></i></a>
			</li>
		<?php } else {
			echo " ";
		} ?>
      		<li class="nav-item">
      			<a class="nav-link image1" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      				<?php if (isset($_SESSION['logged_in_user'])) {
      					$sql = "SELECT username,image FROM users WHERE username = '$_SESSION[logged_in_user]'";
      					$select = mysqli_query($conn,$sql);
      					while($row = mysqli_fetch_assoc($select)) {
      					$name = $row['username'];
      					$image = $row['image']; }
      					?>
      				<img src="<?php echo $image; ?>">
      			</a>
	        	<div class="dropdown-menu mt-3" aria-labelledby="navbarDropdownMenuLink">
	        		<span>Hi <?php echo ucwords($name) ?>!</span>

	        		<?php }
	        		elseif (isset($_SESSION['admin'])) {
      					$sql = "SELECT username,image FROM users WHERE username ='$_SESSION[admin]'";
      					$select = mysqli_query($conn,$sql);
      					while($row = mysqli_fetch_assoc($select)) {
      					$name = $row['username'];
      					$image = $row['image']; }
      					?>
      				<img src="<?php echo $image; ?>">
      			</a>
	        	<div class="dropdown-menu mt-3" aria-labelledby="navbarDropdownMenuLink">
	        		<span>Hi <?php echo ucwords($name) ?>!</span>
      				<?php } else { ?> 
      					<img src="assets/images/null.png">
      			</a>
	        	<div class="dropdown-menu mt-3" aria-labelledby="navbarDropdownMenuLink">
	        		<span>Hi Guest!</span>
	        		<?php } ?>
	        		<?php if (isset($_SESSION['logged_in_user']) OR isset($_SESSION['admin'])) { ?>
	        			<form action="controllers/logout.php">
	        			<button class="dropdown-item">Log-out</button>
	        			</form>
	        		<?php } else { ?>
	        		<a href="#" class="dropdown-item" data-toggle="modal" data-target="#login">Sign-up/Log-in</a>	
	        		<?php } ?>
	        			
	          		
	        	</div>
      		</li>
    	</ul>
  	</div>
</nav>
