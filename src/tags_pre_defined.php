<?php

function check_pre_define_tags($_string)
{
	$pre_define_tags =
	[
	  'Baby Shark',
	  'PINKFONG',
	  'LooLoo Kids',
	  'CoComelon',
		'Johny',
		'Song',
		'Papa',
		'Kids',
		'Halloween',
		'Children',
		'Nursery',
		'Witch',
		'MrBean',
		'Rain',
		'ABC',
	];

	$detected_tags = [];

	foreach ($pre_define_tags as $tag)
	{
	  if(strpos($_string, $tag) !== false)
	  {
	  	array_push($detected_tags, $tag);
	  }
	}


  return $detected_tags;
}

?>