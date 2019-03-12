<?php 

	function getTitle() {
		echo "Admin Page";
	}

	function getContent() { 
		require 'connection.php'; ?>
<?php if (isset($_SESSION['admin'])){ ?>

		<form enctype="multipart/form-data" action="endpoint.php" method="POST">
			<div class="form-group">
				<label>Product Name:</label>
				<input type="text" name="productname" class="form-control">
			</div>
			<div class="form-group">
				<label>Product Categories:</label>
				<select class="custom-select" name="productcategories">
				    <option selected disabled>Choose...</option>
					<?php 
						$sql = "SELECT * FROM categories";
						$categories = mysqli_query($conn,$sql);
						while($row = mysqli_fetch_assoc($categories)) {
							$categoryid = $row['id'];
							$categoryname = $row['name'];
					?>
				    <option value="<?php echo $categoryid ?>"><?php echo $categoryname ?></option>
				    <?php } ?>
				  </select>
			</div>
			<div class="form-group">
				<label>Product Price:</label>
				<input type="number" step=".01" name="productprice" class="form-control">
			</div>
			<div class="form-group">
				<label>Product Stocks:</label>
				<input type="number" name="productstock" class="form-control">
			</div>
			<div class="form-group">
				<label>Product Description:</label>
				<textarea name="productdescription" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<label>Product Image:</label><br>
				<input type="file" name="productimage" accept="image/*" onchange="readURL(this)"> <br>
				<img src="../assets/images/logo-top.png" class="m-3 output">
			</div>
			<div class="form-group">
				<button class="btn btn-success">Submit</button>
			</div>
		</form>
	
	<?php } else {
	echo "";
} ?>
	<?php } require_once 'template_products.php' ?>