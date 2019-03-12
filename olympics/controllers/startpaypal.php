<?php 	

	require "../vendor/autoload.php";
	define('SITE_URL', 'https://bowflexer.000webhostapp.com/olympics/');
	$paypal = new \PayPal\Rest\ApiContext(
		new \PayPal\Auth\OAuthTokenCredential(
			'AYKDa3vIEusE5i-CauU0--4E59nTnDsLewf84DuYILSZ0XtpH3ZjTp4D-aws6Tj_rHZOOhy4Pklt-CNH',
			'EGKfb-0ZKECohzhYTBfyNevSjYn2P8jEMmlo9CmHt-GcgjxXwkChUjxYDmvm1p9SUS35MEvoqOa9wGWY'
		)
	);

 ?>