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
	];

	foreach ($pre_define_tags as $tag)
	{

	  if(strpos($_string, $tag) !== false)
	  {
	    return $tag;
	  }
	}

  return false;
}

?>