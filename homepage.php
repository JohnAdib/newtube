  <div class="grid grid-cols-4 gap-4">
<?php
foreach ($movies as $key => $value)
{
	echo '   ';
	echo '<div class="mb-4">';
	echo '<a href="'. getUrl_wo_params(). '?id='. $value['id']. '">';
	echo '<img class="rounded-lg" alt="cover" src="'. $value['poster']. '">';
	echo '</a>';
	echo '</div>';
}
?>
  </div>