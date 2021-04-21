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
 <div class="container px-2 mx-auto mt-4 mb-4">

  <nav class="bg-white py-2 md:py-4 mb-4 rounded-lg">
    <div class="container px-4 mx-auto md:flex md:items-center">

      <div class="flex justify-between items-center">
        <a href="<?php echo getUrl_wo_params(); ?>" class="font-bold text-xl text-indigo-600">PesonalTube</a>
        <a href="https://MrAdib.com/personalTube" class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">About</a>
      </div>

      <div class="hidden md:flex flex-col md:flex-row md:ml-auto mt-3 md:mt-0" id="navbar-collapse">
<?php if($_GET && $_GET["id"]) {?>
        <a href="<?php echo getUrl_wo_params(); ?>" class="p-2 lg:px-4 md:mx-2 text-indigo-600 text-center border border-solid border-indigo-600 rounded hover:bg-indigo-600 hover:text-white transition-colors duration-300 mt-1 md:mt-0 md:ml-1">Back</a>
<?php }?>
      </div>
    </div>
  </nav>


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