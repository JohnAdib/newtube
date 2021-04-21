<?php
	/**
	 * personal tune creator
	 * v 1.0
	 */
	require_once 'analyzeMedia.php';
	require_once 'tools.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
	<title>PersonalTube</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="css/tailwind-2.1.1.min.css" rel="stylesheet">
	<link href="css/video-js-7.12.1.min.css" rel="stylesheet">
	<link href="css/video-js-city-1.0.1.min.css" rel="stylesheet">
</head>
<body class="bg-pink-50">
 <div class="container mx-auto mt-4 mb-4">
<?php
	if($_GET && $_GET["id"])
	{
		if(isset($movies[$_GET["id"]]))
		{
			$thisVid = $movies[$_GET["id"]];
			// we have id, show player
			require_once 'player.php';
		}
		else
		{
			echo "This Video is not exist!";
		}
	}
	else{
		require_once 'homepage.php';
	}
?>
 </div>
<script src="js/video-7.10.2.min.js"></script>
<script>
	window.HELP_IMPROVE_VIDEOJS = false;
	videojs.options.autoplay = true;
</script>
</body>
</html>