<?php session_start() ?>
<?php require 'controllers/connection.php' ?>
<!DOCTYPE html>
<html>
<head>

	<!-- metas -->
	<?php require_once 'partials/meta.php' ?>

	<title><?php getTitle() ?></title>

	<!-- externals -->
	<?php getExternal() ?>

</head>
<body>
	<?php require_once 'partials/nav.php' ?>

	<?php require_once 'partials/login.php' ?>

	<?php getContent() ?>

	<?php require_once 'partials/footer.php' ?>

	<!-- scripts -->
	<script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script src="https://www.paypalobjects.com/api/checkout.js"></script>
	<script type="text/javascript"><?php require_once 'assets/js/login.js' ?></script>

	<script><?php getScript() ?></script>
</body>
</html>