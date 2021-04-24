<?php if($thisVid['path']) {?>
	<video
	    id="newtube-player"
	    class="video-js rounded-lg w-full	mb-4"
	    controls
	    autoplay
	    preload="auto"
	    mediagroup="newtube"
	    poster="<?php echo $thisVid['poster'] ?>"
	    data-setup='{"fluid": true}'>
	  <source src="<?php echo $thisVid['path'] ?>" type="video/mp4"></source>
	  <p class="vjs-no-js">
	    To view this video please enable JavaScript, and consider upgrading to a
	    web browser that <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
	  </p>
	</video>
<?php if($thisVid['audio']) {?>
  <audio id="newtube-audio" mediagroup="newtube">
    <source src="<?php echo $thisVid['audio'] ?>" type="audio/webm">
  </audio>
<?php }?>
<?php }?>

<?php if($thisVid['tags']) { ?>

	<ul class="grid grid-flow-col auto-cols-min gap-2 mb-4">
<?php
	foreach ($thisVid['tags'] as $key => $myTag)
	{
		echo '<li class="flex rounded-lg">';
		echo '<a class="p-2 lg:px-2 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300 min-w-max" href="'. createUrl_tag($myTag) .'">';
		echo slug_show($myTag);
		echo '</a>';
		echo '</li>';
	}
?>
	</ul>
<?php }?>

	<div class="grid grid-cols-3 sm:grid-cols-6 gap-2 md:gap-2">
<?php
$maxRand = count($MOVIES);
if($maxRand > 7)
{
	$maxRand = 7;
}
shuffle($MOVIES);
$showCount = 0;
for ($i=0; $i < $maxRand; $i++)
{
	$recommend = array_pop($MOVIES);
	if($_GET["id"] === $recommend['id'])
	{
		continue;
	}
	if($showCount < 6)
	{
		echo '    ';
		echo '<div class="mb-1 md:mb-2">';
		echo '<a href="'. createUrl_id($recommend['id']) .'" id=recommendNext'. $i. '>';
		echo '<img class="rounded-lg" alt="cover" src="'. $recommend['poster'] .'">';
		echo '</a>';
		echo '</div>';
	}
	$showCount++;
}

?>
	</div>
