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

	<?php getContent() ?>

	<?php require_once 'partials/footer.php' ?>

	<!-- scripts -->
	<script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<?php getScript() ?>
</body>
</html>