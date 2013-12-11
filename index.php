<?php

// security headers
$csp = "default-src none; style-src 'self'";
header('Content-Security-Policy: ' . $csp);
header('X-Content-Security-Policy: ' . $csp);
header('X-WebKit-CSP: ' . $csp);
header('X-XSS-Protection: 1; mode=block');
header_remove('X-Powered-By');

// other headers
header('Content-Type: text/html; charset=utf-8');
header('X-UA-Compatible: IE=edge');

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<link rel="stylesheet" href="the.css">
<title>two-factor authentication list</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

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
			<p>lovingly made by <a href="http://evanhahn.com">Evan Hahn</a> with contributions from <a href="http://mathiasjakobsen.dk/">Mathias Jakobsen</a>, <a href="http://williamella.com/">Billy Ella</a>, Andrew Uhl, and <a href="http://twitter.com/_MattDolan">Matt Dolan</a>. ❤</p>
		</div>
	</div>

	<div class="description">
		<div class="container">
			<p>Two-factor authentication requires an additional step in addition to entering your password, usually by sending a message to your mobile phone. It'll make you more secure.</p>
		</div>
	</div>

</header>

<?php $services = json_decode(file_get_contents('./data.json'))->services ?>

<ul id="service-list" class="container">

	<?php foreach ($services as &$service): ?>
		<li>
			<h1><?php echo $service->name ?></h1>
			<?php if (isset($service->url)): ?>
				<a title="Enable it" href="<?php echo $service->url ?>" target="_blank">
					Enable it
				</a>
			<?php endif ?>
			<?php if (isset($service->howto)): ?>
				<a title="How-to" href="<?php echo $service->howto ?>" target="_blank">
					How-to
				</a>
			<?php endif ?>
			<?php if (isset($service->info)): ?>
				<a title="Info" href="<?php echo $service->info ?>" target="_blank">
					Info
				</a>
			<?php endif ?>
		</li>
	<?php endforeach ?>

</ul>

<footer>
	<div class="container">

		<p>Want to add a website? <a href="mailto:me@evanhahn.com">Send me an email</a> or <a href="https://github.com/EvanHahn/two-factor-auth-list/edit/master/data.json">send a pull request on GitHub</a>. I'll credit you and the internet will love you forever.</p>

		<p><a href="https://github.com/EvanHahn/two-factor-auth-list">Check this project out on GitHub</a>, too. There are pictures of fire.</p>

	</div>
</footer>

</body>
</html>
