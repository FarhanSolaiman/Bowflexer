<?php 

	function getTitle() {
		echo "Orders Page";
	}

	function getContent() { 

	if (isset($_SESSION['admin'])){ 
		require 'connection.php';
		?>

	<h1 class="head">ORDERS LIST</h1>
	<div class="container-fluid">

		 <table class="table table-filter sortable">
				<thead>
					<tr>
						<th data-defaultsign="none">Product Image:</th>
						<th data-defaultsign="AZ">Product Name:</th>
						<th data-defaultsign="_19">Product Price:</th>
						<th data-defaultsign="_19">Product Quantity:</th>
						<th data-defaultsign="_19">Total:</th>
						<th data-defaultsign="none">User Image:</th>
						<th data-defaultsign="_19">Date Bought:</th>
						<th data-defaultsign="none">Transaction Code:</th>
					</tr>
				</thead>
				<tbody>
		<?php
		$sql = "SELECT o.id, p.name, p.image, p.price,o.quantity, o.total, u.image user, o.date_bought dates, ords.transaction_code tran FROM  order2 o
			JOIN products p ON (p.id = o.product_id)
			JOIN users u ON (u.id = o.user_id)
			JOIN order_detail1 ords ON (o.date_bought = ords.date_created)";

			$select = mysqli_query($conn,$sql);

			while($row = mysqli_fetch_assoc($select)) {
				$id = $row['id'];
				$name = $row['name']; 
				$image = $row['image'];
				$price = $row['price']; 
				$quantity = $row['quantity'];
				$total = $row['total'];
				$user = $row['user'];
				$date = $row['dates'];
				$tran = $row['tran'];
		 ?>
		 		<tr data-id="<?php echo $id ?>">
					<td><img src="../<?php echo $image ?>"></td>
					<td name="name"><h3><?php echo ucfirst($name) ?></h3></td>
					<td name="price">$<?php echo $price ?></td>
					<td name="quantity"><?php echo $quantity ?> pcs</td>
					<td name="total">$<?php echo $total ?></td>
					<td name="user"><img src="../<?php echo $user ?>"></td>
					<td name="date"><?php echo $date ?></td>
					<td name="trancode"><?php echo $tran ?></td>
				</tr>
		<?php } ?>
	</tbody>
</table>

	</div>

	<?php } else {
	echo "";
} ?>
	<?php } require_once 'template_products.php' ?>