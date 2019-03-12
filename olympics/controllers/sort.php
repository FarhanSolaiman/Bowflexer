<?php session_start();
	require "connection.php";

	$action = $_POST['action'];

	if ($action == "all") {
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
					} ?><br>
					<span id="added<?php echo $prodid ?>"></span>
			</div>

	<?php }
	}

	if ($action == "arrows") {
		$sql = "SELECT * FROM products WHERE category_id = 1";
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
					} ?><br>
					<span id="added<?php echo $prodid ?>"></span>
			</div>

	<?php }

	}

	if ($action == "stabilizer") {
		$sql = "SELECT * FROM products WHERE category_id = 2";
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
					} ?><br>
					<span id="added<?php echo $prodid ?>"></span>
			</div>

	<?php }

	}

	if ($action == "quiver") {
		$sql = "SELECT * FROM products WHERE category_id = 4";
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
					} ?><br>
					<span id="added<?php echo $prodid ?>"></span>
			</div>

	<?php }

	}

	if ($action == "bag") {
		$sql = "SELECT * FROM products WHERE category_id = 3";
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
					} ?><br>
					<span id="added<?php echo $prodid ?>"></span>
			</div>

	<?php }

	}

?>