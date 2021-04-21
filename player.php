	<video
	    id="my-player"
	    class="video-js rounded-lg w-full	mb-2"
	    controls
	    autoplay
	    preload="auto"
<?php if($thisVid['path']) {?>
	    poster="<?php echo $thisVid['poster'] ?>"
<?php }?>
	    data-setup='{}'>
	  <source src="<?php echo $thisVid['path'] ?>" type="video/mp4"></source>
	  <p class="vjs-no-js">
	    To view this video please enable JavaScript, and consider upgrading to a
	    web browser that <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
	  </p>
	</video>

	<div class="grid grid-cols-6 gap-2">
<?php
$maxRand = count($movies);
if($maxRand > 6)
{
	$maxRand = 6;
}
$random_Vid = shuffle ($movies);
for ($i=0; $i < $maxRand; $i++)
{
	$recommend = array_pop($movies);
	if($_GET["id"] === $recommend['id'])
	{
		continue;
	}
	echo '    ';
	echo '<div class="mb-2">';
	echo '<a href="'. createUrl_id($recommend['id']) .'">';
	echo '<img class="rounded-lg" alt="cover" src="'. $recommend['poster'] .'">';
	echo '</a>';
	echo '</div>';
}

?>
	</div>
