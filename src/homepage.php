  <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 md:gap-4">
<?php
if($movies)
{
	foreach ($movies as $key => $value)
	{
		echo '   ';
		echo '<div class="mb-1 md:mb-2">';
		echo '<a href="'. createUrl_id($value['id']). '">';
		echo '<img class="rounded-lg" alt="cover" src="'. $value['poster']. '">';
		echo '</a>';
		echo '</div>';
	}

}
else
{
	echo "Please put your mp4 and jpg poster of videos inside media folder.";
}
?>
  </div>