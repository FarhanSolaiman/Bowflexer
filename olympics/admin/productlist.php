<?php 

	function getTitle() {
		echo "Product List";
	}

	function getContent() { 
		require 'connection.php' ?>

<?php if (isset($_SESSION['admin'])){ ?>
			<div class="btn-group" role="group">
			  <button type="button" class="btn btn-secondary btn-filter" data-target="all">All</button>
			  <button type="button" class="btn btn-secondary btn-filter" data-target="1">Arrows</button>
			  <button type="button" class="btn btn-secondary btn-filter" data-target="2">Stabilizers</button>
			  <button type="button" class="btn btn-secondary btn-filter" data-target="4">Quivers</button>
			  <button type="button" class="btn btn-secondary btn-filter" data-target="3">Bags</button>
			</div><br><br>
			<table class="table table-filter sortable">
				<thead>
					<tr>
						<th data-defaultsign="AZ">Product Name:</th>
						<th data-defaultsign="AZ">Product Category:</th>
						<th data-defaultsign="_19">Product Price:</th>
						<th data-defaultsign="_19">Product Stocks:</th>
						<th data-defaultsign="AZ">Product Description:</th>
						<th data-defaultsign="none">Product Image:</th>
						<th data-defaultsign="none">Actions</th>
					</tr>
				</thead>
				<tbody>
						<?php 
						$sql = "SELECT p.id prodid, p.name prodname,c.name catname,c.id catid,p.price,p.stock,p.description,p.image FROM categories c JOIN products p ON (c.id = p.category_id)";
						$select = mysqli_query($conn,$sql);
						while($row = mysqli_fetch_assoc($select)) {
							$name = $row['prodname'];
							$cat_id = $row['catid'];
							$prod_id = $row['prodid'];
							$category = $row['catname']; 
							$price = $row['price']; 
							$stock = $row['stock']; 
							$desc = $row['description']; 
							$image = $row['image'];
							 ?>
					<tr data-status="<?php echo $cat_id ?>">
						<td name="name"><h3><?php echo ucfirst($name) ?></h3></td>
						<td><?php echo $category ?><input type="hidden" value="<?php echo $cat_id ?>" name="cat"></td>
						<td name="price">$<?php echo $price ?></td>
						<td name="stock"><?php echo $stock ?> pcs</td>
						<td name="desc"><?php echo $desc ?></td>
						<td><img src="../<?php echo $image ?>"></td>
						<td>
							<button class="btn btn-primary" data-toggle="modal" data-target="#edit<?php echo $prod_id ?>">Update</button><br><br>
							<a href="remove.php?prodid=<?php echo $prod_id ?>&action=product"><button class="btn btn-danger">Remove</button></a>
						</td>
					</tr>

					<div class="modal fade" id="edit<?php echo $prod_id ?>" tabindex="-1" role="dialog" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content" class="edit1">
					      <div class="modal-header"><h4>EDIT THE PRODUCT</h4>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button></div>
					      <div class="modal-body">

							<form enctype="multipart/form-data" action="edit.php" method="POST">
								<input type="hidden" value="<?php echo $prod_id ?>" name="productid">
								<div class="form-group">
									<label>Product Name:</label>
									<input type="text" name="productname" class="form-control" value="<?php echo ucfirst($name) ?>">
								</div>
								<div class="form-group">
									<label>Product Categories:</label>
									<select class="custom-select" name="productcategories">
									    <option value="<?php echo $cat_id ?>" selected readonly><?php echo $category ?></option>
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
									<input type="number" step=".01" name="productprice" value="<?php echo $price ?>" class="form-control">
								</div>
								<div class="form-group">
									<label>Product Stocks:</label>
									<input type="number" name="productstock" value="<?php echo $stock ?>" class="form-control">
								</div>
								<div class="form-group">
									<label>Product Description:</label>
									<textarea name="productdescription" value="<?php echo $desc ?>" class="form-control"><?php echo $desc ?></textarea>
								</div>
								<div class="form-group">
									<label>Product Image:</label><br>
									<input type="file" name="productimage" accept="image/*" onchange="readURL(this)"> <br>
									<img class="m-3 output">
								</div>
								<div class="form-group">
									<button class="btn btn-success">Submit</button>
								</div>
							</form>

					      </div>
					    </div>
					  </div>
					</div>

						<?php } ?>
				</tbody>
			</table>


	<?php } else {
	echo "";
} ?>
	<?php } require_once 'template_products.php' ?>