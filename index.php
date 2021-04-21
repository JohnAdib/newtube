<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
	<title>BabyTube</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="css/tailwind-2.1.1.min.css" rel="stylesheet">
</head>
<body class="bg-pink-300">
<?php require 'analyzeMedia.php'; ?>

 <div class="container mx-auto mt-4 mb-4">
  <div class="grid grid-cols-4 gap-4">
<?php
foreach ($movies as $key => $value)
{
	echo '   ';
	echo '<div class="mb-4">';
	echo '<img class="rounded-lg" alt="cover" src="'. $value['poster']. '">';
	echo '</div>';
}
?>
  </div>
 </div>

</body>
</html>