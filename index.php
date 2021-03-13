<?php

// security headers
$csp = "default-src none;style-src 'self'";
header('Content-Security-Policy: ' . $csp);
header('X-Content-Security-Policy: ' . $csp);
header('X-WebKit-CSP: ' . $csp);
header('X-XSS-Protection: 1; mode=block');
header_remove('X-Powered-By');

// other headers
header('Content-Type: text/html; charset=utf-8');
header('X-UA-Compatible: IE=edge');

// some variables
$title = 'Two-factor authentication list';
$description = 'A big list of services that support two-factor authentication to make your accounts more secure.';
$logo_image = 'https://evanhahn.com/2fa/2.png';

?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<link rel="stylesheet" href="the.css">
<title><?php echo $title ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<meta name="description" content="<?php echo $description ?>">
<meta name="keywords" content="two-factor,authentication,security,passwords,2FA">

<meta property="og:title" content="<?php echo $title ?>">
<meta property="og:description" content="<?php echo $description ?>">
<meta property="og:image" content="<?php echo $logo_image ?>">
<meta property="og:type" content="website">
<meta property="og:url" content="https://evanhahn.com/2fa">

<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@EvanHahn">
<meta name="twitter:title" content="<?php echo $title ?>">
<meta name="twitter:description" content="<?php echo $description ?>">
<meta name="twitter:creator" content="@EvanHahn">
<meta name="twitter:image:src" content="<?php echo $logo_image ?>">
<meta name="twitter:domain" content="evanhahn.com">

</head>
<body>

<header>

	<div class="logo">
		<div class="container">
			<h1><?php echo $title ?></h1>
		</div>
	</div>

	<div class="container">

		<p>
			Two-factor authentication requires an additional step in addition to entering your password, usually by sending a message to your mobile phone or using an app in your smartphone. It'll make you more secure.
		</p>

		<a class="other-site" href="https://2fa.directory/">
			<p>
			See 2fa.directory for another more up-to-date list.
			</p>
		</a>

	</div>

</header>

<?php
$data = json_decode(file_get_contents('./data.json'));
$services = $data->services;
$author = $data->author;
$contributors = $data->contributors;
?>

<ul id="service-list" class="container">

<?php foreach ($services as &$service): ?>
	<li>
		<h1><?php echo $service->name ?></h1>
		<?php if (isset($service->url)): ?>
			<a title="Enable it" href="<?php echo $service->url ?>" target="_blank">Enable it</a>
		<?php endif ?>
		<?php if (isset($service->howto)): ?>
			<a title="How-to" href="<?php echo $service->howto ?>" target="_blank">How-to</a>
		<?php endif ?>
		<?php if (isset($service->info)): ?>
			<a title="Info" href="<?php echo $service->info ?>" target="_blank">Info</a>
		<?php endif ?>
	</li>
<?php endforeach ?>

</ul>

<?php

function person($person) {
	if (is_string($person)) {
		echo $person;
	} else {
		echo "<a title=\"$person->name\" href=\"$person->url\">";
		echo $person->name;
		echo '</a>';
	}
}

?>

<footer><div class="container">

	<p>

		Lovingly made by <?php person($author) ?> with contributions from

		<?php

		$count = count($contributors);
		foreach ($contributors as $index => &$contributor) {
			person($contributor);
			if ($index < ($count - 1))
				echo ', ';
			if ($index == ($count - 2))
				echo 'and ';
		}

		?>. &#x2764;

	</p>

	<p>Want to add a website? <a href="mailto:me@evanhahn.com">Send me an email</a> or <a href="https://github.com/EvanHahn/two-factor-auth-list/edit/master/data.json">send a pull request on GitHub</a>. I'll credit you and the internet will love you forever.</p>

	<p><a href="https://github.com/EvanHahn/two-factor-auth-list">Check this project out on GitHub</a>, too.</p>

</div></footer>

</body>
</html>
