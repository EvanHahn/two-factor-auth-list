<?php

$csp = "default-src none; style-src 'self'";
header('Content-Security-Policy: ' . $csp);
header('X-Content-Security-Policy: ' . $csp);
header('X-WebKit-CSP: ' . $csp);
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');
header_remove('X-Powered-By');

?>

<!DOCTYPE html>

<!-- lovingly made by Evan Hahn. -->

<html lang="en">
<head>

<meta charset="utf-8">
<link rel="stylesheet" href="the.css">
<title>two-factor authentication list</title>

</head>
<body>

<header>
	<div class="container">
		<h1>two-factor authentication list</h1>
	</div>
</header>

<ul id="service-list">

	<?php $services = json_decode(file_get_contents('./data.json'))->services ?>

	<?php foreach ($services as &$service): ?>

		<a href="<?php echo $service->url ?>" title="<?php echo $service->name ?>">
			<li><?php echo $service->name ?></li>
		</a>

	<?php endforeach ?>

</ul>

</body>
</html>
