<?php session_start(); ?>
<?php require_once 'connection.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">

	<title><?php getTitle() ?></title>

	<!-- externals -->
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link href="https://www.jqueryscript.net/demo/jQuery-Plugin-For-Sortable-Bootstrap-Tables-Bootstrap-Sortable/Contents/bootstrap-sortable.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="../assets/css/nav.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/footer.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/index.css">
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link rel="stylesheet" href="../assets/css/icofont.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed:700" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/icofont.css">
	<link rel="icon" type="image/png" sizes="16x16" href="../favicon.png">

</head>
<body>

	<?php require_once 'nav.php' ?>

		<div class="container-fluid">
			<?php if (isset($_SESSION['admin'])){ ?>
			<?php getContent() ?>
				<?php } else {
	echo "<h3 style='text-align: center;'>YOU HAVE NO ACCESS TO THIS PAGE.<br>HEAD BACK TO THE PREVIOUS PAGE.</h3>";
} ?>
		</div>
		<?php require_once 'footer.php' ?>

		<script src="../assets/js/jquery-3.3.1.js"></script>
		<script src="../assets/js/bootstrap.js"></script>
		<script src="https://www.jqueryscript.net/demo/jQuery-Plugin-For-Sortable-Bootstrap-Tables-Bootstrap-Sortable/Scripts/bootstrap-sortable.js"></script> 
		<script src="script.js"></script>

	</body>
	</html>