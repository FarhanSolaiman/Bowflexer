<?php require "connection.php";

	$username = $_POST['name1'];
	$password = sha1($_POST['password1']);
	$image = "assets/images/users/".$_FILES['image']['name'];
	$image2 = "assets/images/null.png";

	if (strlen($_FILES['image']['name']) == 0) {
	$sql = "INSERT INTO users(username,password,image,role_id) VALUES ('$username','$password','$image2',2)";
	
	$result = mysqli_query($conn, $sql);	
	} else {	
	move_uploaded_file($_FILES['image']['tmp_name'], "../".$image);

	$sql = "INSERT INTO users(username,password,image,role_id) VALUES ('$username','$password','$image',2)";

	$result = mysqli_query($conn, $sql);
	}

	header('location: ../index.php');
?>