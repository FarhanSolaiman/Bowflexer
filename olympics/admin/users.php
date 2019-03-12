<?php 

	function getTitle() {
		echo "Users List";
	}

	function getContent() { 
		require 'connection.php' ?>

		<div class="container-fluid">
			
			<table class="table table-filter sortable">
				<thead>
					<tr>
						<th  data-defaultsign="AZ">User Name:</th>
						<th data-defaultsign="none">User Image:</th>
						<th data-defaultsign="none">Role:</th>
						<th data-defaultsign="none">Remove</th>
					</tr>
				</thead>
				<tbody>
						<?php 
						$sql = "SELECT u.id userid,u.username,u.image,r.name FROM users u JOIN roles r ON (r.id = u.role_id)";
						$select = mysqli_query($conn,$sql);
						while($row = mysqli_fetch_assoc($select)) {
							$id = $row['userid'];
							$name = $row['username']; 
							$image = $row['image'];
							$role = $row['name'];
							 ?>
					<tr>
						<td><h3><?php echo ucfirst($name) ?></h3></td>
						<td><img src="../<?php echo $image ?>"></td>
						<td><?php echo ucfirst($role) ?></td>
						<td>
							<a href="remove.php?userid=<?php echo $id ?>&action=user"><button class="btn btn-danger">Remove</button></a>
						</td>
							
					</tr>
						<?php } ?>
				</tbody>
			</table>

		</div>
	<?php } require_once 'template_products.php' ?>