<?php 
function getTitle() {
	// title
	echo "BOWFLEXER &copy; || About Page";
}

function getExternal() { ?>
<!-- externals -->
<link rel="stylesheet" type="text/css" href="assets/css/nav.css">
<link rel="stylesheet" type="text/css" href="assets/css/about.css">
<link rel="stylesheet" type="text/css" href="assets/css/footer.css">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
<link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed:700" rel="stylesheet">
<link rel="stylesheet" href="assets/css/icofont.css">
<link rel="icon" type="image/png" sizes="16x16" href="favicon.png">
<?php
}

function getContent() { ?>
<!-- Content -->
<div class="container-fluid my-4" id="about">
	<h1 class="pt-3" id="head">ABOUT BOWFLEXER</h1>
	<div class="row">
		<div class="col-lg-4 col-12" id="wahid">
			<img src="assets/images/shop.jpg" class="mt-2 mb-3" id="shop">
			<h4 class="text">Caring, Integrity, Excellence</h4>
			<p>Bowflexer Archery Equipment and Apparel supports archers worldwide with a website and retail showroom based in Quezon City, PH.</p>
		</div>
		<div class="col-lg-4 col-12">
			<h4 class="text">Over Twenty Five Years of Caring, Integrity and Excellence</h4>
			<p>Thank you for your trust, friendship and business over the past 25 years. We have been blessed to be able to share our love of archery with all of you throughout the years and look forward to many more.
			<br>
			Caring, Integrity and Excellence are the values chosen as most important by our entire BFAEA staff, not empty words used by an advertising agency. Since 1993, we have constantly sought to improve and expand our service and selection in order to serve you beyond your expectations as we Lead the World in Target Archery. We have the largest selection of top quality Olympic and Bowhunting Archery equipment in the world in stock and available to you immediately upon your call.
			<br>
			I would like to personally thank each of you for allowing us to serve your archery needs and for recommending us to others in archery. We take our responsibilities to you seriously as we look forward to helping you achieve your shooting or archery business goals. Each of us shares your love of archery, whether you enjoy Olympic Recurve, Bow Hunting or shooting for recreation. Our staff shoots every form of archery with a deep passion and love of the sport.</p>
		</div>
		<div class="col-lg-4 col-12">
			<h4 class="text">Reputation Trusted Worldwide</h4>
			<p>Our trusted reputation for professional, fast, and courteous service is known worldwide. We evaluate, select, sell, and service only the finest quality archery products. Bowflexer Archery Equipment and Apparel specializes in providing you with the newest innovations in Target Archery as we are the “Recurve Experts” in Target Archery.</p>
			<h4 class="text">Our Commitment to You</h4>
			<p>We are committed to providing archery equipment to businesses, organizations and individuals as a leading worldwide archery distributor. We maintain our leadership through integrity, technical expertise, and a continuing focus on excellence in service to our customers. We promote archery with a passion in our efforts to facilitate the growth of the sport and our company while focusing on the highest quality in order to continuously improve our value to our customers, vendors and BFAEA team members.
			<br>
			THANK YOU for joining our growing circle of friends from all around the world. We know that you will find no finer source for all of your archery needs. Don't settle for anything less, EXCEL with us! Visit this website frequently for the latest news, specials, calendar of events and products. Take your best shot and give us a visit, call, or e-mail. You'll shoot better for it!</p>
		</div>
	</div>
</div>

<?php } 

function getScript() { ?>
<!-- script -->


<?php }

require_once 'partials/template.php';
?>