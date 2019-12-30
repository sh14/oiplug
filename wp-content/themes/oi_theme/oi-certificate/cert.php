<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<?php
$data = array(
	'title'        => 'Certificate of Completion',
	'subtitle'     => 'this certifies that',
	'name'         => 'Anton Shlobin',
	'description'  => 'has completed the necessary courses of studies and passed the exam and is hereby declared a',
	'profession'   => 'Certified PHP Developer',
	'description2' => 'with fundamental knowledge of web development using PHP.',
	'date'         => 'granted august 1,2017',
	'url'          => 'oiplug.com/certificate/',
	'id'           => '5188',
);
?>

<div class="cert">
	<div class="cert__border">
		<div class="cert__title"><?php echo $data['title']; ?></div>
		<div class="cert__subtitle"><?php echo $data['subtitle']; ?></div>
		<div class="cert__name"><?php echo $data['name']; ?></div>
		<div class="cert__description"><?php echo $data['description']; ?></div>
		<div class="cert__profession"><?php echo $data['profession']; ?></div>
		<div class="cert__description2"><?php echo $data['description2']; ?></div>
		<div class="cert__id-block">
			<div class="cert__date"><?php echo $data['date']; ?></div>
		<div class="cert__id-block-container">
			<div class="cert__url"><?php echo $data['url']; ?></div>
			<div class="cert__id">ID: <?php echo $data['id']; ?></div>
		</div>
		</div>
	</div>
</div>

</body>
</html>
