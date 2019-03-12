<?php 

	require "connection.php";

	$action = $_POST['action'];

	if ($action == 'registry') {
		$username = $_POST['username'];
		$sql = "SELECT username FROM users WHERE username = '$username'";
		$result = mysqli_query($conn,$sql);

		if (mysqli_num_rows($result) > 0) {
			echo "good";
		} else {
			if (strlen($username) == 0) {
				echo "none";
			} 
			else {
			echo "bad";
			}
		}
	};

	if ($action == 'login') {
		$username = $_POST['username'];
		$password = sha1($_POST['password']);
		$sql = "SELECT * FROM users WHERE 
			username = '$username' AND 
			password = '$password'";
		$result = mysqli_query($conn,$sql);
		
		if (mysqli_num_rows($result) > 0) {
			echo "good";
		} else { 
			if (strlen($username) == 0 OR strlen($password) == 0) {
			echo "none";
		} else {
			echo "bad";
		}
	}
}
 ?>