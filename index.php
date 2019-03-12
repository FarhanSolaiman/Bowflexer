<?php 
function getTitle() {
	// title
	echo "BOWFLEXER &copy;";
}

function getExternal() { ?>
<!-- externals -->
<link rel="stylesheet" type="text/css" href="assets/css/nav.css">
<link rel="stylesheet" type="text/css" href="assets/css/index.css">
<link rel="stylesheet" type="text/css" href="assets/css/footer.css">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
<link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed:700" rel="stylesheet">
<link rel="stylesheet" href="assets/css/icofont.css">
<link rel="icon" type="image/png" sizes="16x16" href="favicon.png">
<?php
}

function getContent() { ?>
<!-- content -->
<div class="container-fluid mt-4 mb-5">
	<div  id="carou" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner car">
			<div id ="first" class="carousel-item active car1">
				<div class="enter_site">
					<div class="cont">
						<img src="assets/images/logo1.png">
						<p class="arc">Olympic Archery</p>
						<a href="olympics/index.php" class="lina"><button class="cli">Enter Site</button></a>
					</div>
				</div>
			</div>
			<div id="second" class="carousel-item car1">
				<div class="enter_site">
					<div class="cont">
						<img src="assets/images/logo2.png">
						<p class="arc">Hunting Archery</p>
						<a href="/" data-toggle="modal" data-target="#hunt" class="lina"><button class="cli">Enter Site</button></a>
					</div>
				</div>
			</div>
		</div>
		<a class="carousel-control-prev" href="#carou" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		</a>
		<a class="carousel-control-next" href="#carou" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
		</a>
	</div>
</div>

<div class="modal fade" id="hunt" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header"><h4>Sorry for the inconvenience</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>This part of the site is still under construction.</p>
			</div>
		</div>
	</div>
</div>


				<?php } 

				function getScript() { ?>
				<!-- script -->

				<?php }

				require_once 'partials/template.php';
				?>