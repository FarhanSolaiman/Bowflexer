<?php session_start();

	require "connection.php";

	$username = $_POST['name2'];
	$password = sha1($_POST['password2']);

	$sql = "SELECT * FROM users WHERE 
			username = '$username' AND 
			password = '$password'";

	$result = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['username'];
		$id = $row['id'];
	}

	if (mysqli_num_rows($result) > 0) {
		if ($name == "admin") {
			$_SESSION['admin']  = $username;
			$_SESSION['adminnum']  = $id;
		} else {
		$_SESSION['logged_in_user']  = $username;
		$_SESSION['usernum']  = $id;
		}
	} else {
		$_SESSION['error_message']  = "Incorrect Username and Password. Please login again.";
	}

	header('location: ../index.php');

 ?>