<?php 
function getTitle() {
	// title
	echo "BOWFLEXER &copy; || Contact Page";
}

function getExternal() { ?>
<!-- externals -->
<link rel="stylesheet" type="text/css" href="assets/css/nav.css">
<link rel="stylesheet" type="text/css" href="assets/css/contact.css">
<link rel="stylesheet" type="text/css" href="assets/css/footer.css">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
<link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed:700" rel="stylesheet">
<link rel="stylesheet" href="assets/css/icofont.css">
<link rel="icon" type="image/png" sizes="16x16" href="favicon.png">
<?php
}

function getContent() { ?>
<!-- Content -->
<div class="container-fluid" id="contactpage">
	<h1 class="text my-2" id="locationhead">Location</h1>
	<div class="mapouter mt-3 mb-3" id="location">
		<div class="gmap_canvas">
			<iframe id="gmap_canvas" src="https://maps.google.com/maps?q=caswynn%20building&t=&z=15&ie=UTF8&iwloc=&output=embed"></iframe>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6 py-2 pl-5" id="contact">	
			<h1 class="text">Contact Information</h1>
			<h3 class="big pl-2">Phone Number:</h3>
			<p class="pl-4"><i class="icofont-phone icofont-lg"></i> 0927-123-4567 / (02)454-8901</p>
			<h3 class="big pl-2">Facebook:</h3>
			<p class="pl-4"><i class="icofont-facebook"></i> /BowflexerPH</p>
			<h3 class="big pl-2">Instagram:</h3>
			<p class="pl-4"><i class="icofont-instagram"></i> @BowflexerPH</p>
			<h3 class="big pl-2">Amazon:</h3>
			<p class="pl-4"><i class="icofont-brand-amazon"></i> /BowflexerPH</p>
		</div>
		<div class="col-lg-6 py-2" id="message">
			<form>
				<h1 class="text">Message Us:</h1>
				<h3 class="big">Name:</h3>
				<input class="form-control mb-3" type="text" name="messname" placeholder="Your name...">
				<h3 class="big">Feedback:</h3>
				<textarea class="form-control mb-2" name="messtext" placeholder="Your message..."></textarea>
				<button class="btn float-right" id="but1">Submit</button>
			</form>
		</div>
	</div>
</div>

<?php } 

function getScript() { ?>
<!-- script -->


<?php }

require_once 'partials/template.php';
?>