<?php 
function getTitle() {
	// title
	echo "Olympic Archery";
}

function getExternal() { ?>
	<!-- externals -->
	<link rel="stylesheet" type="text/css" href="assets/css/nav.css">
	<link rel="stylesheet" type="text/css" href="assets/css/index.css">
	<link rel="stylesheet" type="text/css" href="assets/css/footer.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed:700" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/icofont.css">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon.png">
<?php
}

function getContent() { ?>
	<!-- content -->
	<div class="container-fluid">
		<div class="title">
			<h1 class="no-span head">WELCOME TO BOWFLEXER</h1>
		</div>
	<div class="row">
		<div class="video p-3 col-lg-6">	
			<div id="player"></div>
		</div>
		<div class="col-lg-6 p-3">
			<h5><b>Archery</b> is the art, sport, practice or skill of using a bow to shoot arrows.<br> The word comes from the Latin "arcus". <br>Historically, archery has been used for hunting and combat. <br>In modern times, it is mainly a competitive sport and recreational activity. <br>A person who participates in archery is typically called an archer or a bowman, and a person who is fond of or an expert at archery is sometimes called a toxophilite.</h5>
		</div>
	</div>
	</div>

<?php } 

function getScript() { ?>
	<!-- script -->
      let tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      let firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);


      let player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '100%',
          width: '100%',
          videoId: '5_G0etIG6Xw',
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      function onPlayerReady(event) {
        event.target.playVideo();
      }


      let done = false;
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
          done = true;
        }
      }
      
<?php } require_once 'partials/template.php'; ?>