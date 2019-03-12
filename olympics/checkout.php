<?php 
function getTitle() {
	// title
	echo "Olympic Archery || Checkout";
}

function getExternal() { ?>
	<!-- externals -->
	<link rel="stylesheet" type="text/css" href="assets/css/nav.css">
	<link rel="stylesheet" type="text/css" href="assets/css/footer.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed:700" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/icofont.css">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon.png">
<?php
}

function getContent() { ?>
	<?php require 'controllers/connection.php' ?>
	<!-- content -->
	

<?php } 

function getScript() { ?>
	<!-- script -->

<?php }

	require_once 'partials/template.php';
?>