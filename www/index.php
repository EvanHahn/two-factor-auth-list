<?php

// security headers
$csp = "default-src none; style-src 'self'";
header('Content-Security-Policy: ' . $csp);
header('X-Content-Security-Policy: ' . $csp);
header('X-WebKit-CSP: ' . $csp);
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');
header_remove('X-Powered-By');

// other headers
header('Content-Type: text/html; charset=utf-8');

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="the.css">
<title>two-factor authentication list</title>

</head>
<body>

<header>

	<div class="logo">
		<div class="container">
			<h1>two-factor authentication list</h1>
		</div>
	</div>

	<div class="authors">
		<div class="container">
			<p>lovingly made by <a href="http://evanhahn.com">Evan Hahn</a>. ❤</p>
		</div>
	</div>

	<div class="description">
		<div class="container">
			<p>Two-factor authentication requires an additional step in addition to entering your password, usually by sending a message to your mobile phone.</p>
		</div>
	</div>

</header>

<?php $services = json_decode(file_get_contents('./data.json'))->services ?>

<ul id="service-list" class="container">

	<?php foreach ($services as &$service): ?>
		<li>
			<h1><?php echo $service->name ?></h1>
			<?php if (isset($service->url)): ?>
				<a title="Enable it" href="<?php echo $service->url ?>">
					Enable it
				</a>
			<?php endif ?>
			<?php if (isset($service->howto)): ?>
				<a title="How-to" href="<?php echo $service->howto ?>">
					How-to
				</a>
			<?php endif ?>
			<?php if (isset($service->info)): ?>
				<a title="Info" href="<?php echo $service->info ?>">
					Info
				</a>
			<?php endif ?>
		</li>
		</a>
	<?php endforeach ?>

</ul>

</body>
</html>
