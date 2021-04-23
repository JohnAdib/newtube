  <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 md:gap-4">
<?php
if($thisTag)
{
	shuffle($thisTag);
	foreach ($thisTag as $key => $myVideoID)
	{
		if(isset($MOVIES[$myVideoID]))
		{
			echo '   ';
			echo '<div class="mb-1 md:mb-2">';
			echo '<a href="'. createUrl_id($myVideoID). '">';
			echo '<img class="rounded-lg" alt="cover" src="'. $MOVIES[$myVideoID]['poster']. '">';
			echo '</a>';
			echo '</div>';
		}
	}

}
else
{
	echo "Tag is empty!";
}
?>
  </div>