<?php
$movies = [];
foreach (glob("media/*.mp4") as $_filePath)
{
	$filename = substr(basename($_filePath), 0, -4);
	$thisMovie =
	[
		'path'    => $_filePath,
		'poster'  => null,
		'name'    => $filename,
		'size'    => round(filesize($_filePath) / 1024 / 1024, 1). 'MB',
		'id'      => md5($_filePath),
		'imdb'    => null,
		'year'    => null,
		'title'   => null,
		'quality' => null,
		'tags'    => [],
	];

	// find poster
	if(is_file(substr($_filePath, 0, -3). 'jpg'))
	{
		$thisMovie['poster'] = substr($_filePath, 0, -3). 'jpg';
	}
	if(is_file(substr($_filePath, 0, -3). 'png'))
	{
		$thisMovie['poster'] = substr($_filePath, 0, -3). 'png';
	}

	$name = $filename;
	// sample file name
	// [3.7] 1987 Superman IV The Quest for Peace [1080]
	// [8.1] 2003 Pirates of the Caribbean 1 - The Curse of the Black Pearl [720]

	// check imdb rank if exist
	if(substr($name, 0, 1) === '[' && substr($name, 4, 2) === '] ')
	{
		// detect imdb rank on start
		$imdbRank = substr($name, 1, 3);
		$imdbRank = floatval($imdbRank);
		$thisMovie['imdb'] = $imdbRank;

		$name = trim(substr($name, 5));
	}

	// detect year of movie
	if(is_numeric(substr($name, 0, 4)))
	{
		$thisMovie['year'] = intval(substr($name, 0, 4));
		$name = trim(substr($name, 4));
	}

	// detect quality
	$qualityTxt = trim(substr($name, -6));
	if(substr($qualityTxt, 0, 1) === '[' && substr($qualityTxt, -1) === ']')
	{
		// we detect quality
		$thisMovie['quality'] = intval(substr($qualityTxt, 1, -1));
		$name = trim(substr($name, 0, -6));
	}

	// detect tag
	$tagStart = strpos($name, '{');
	$tagEnd = strpos($name, '}');

	if($tagStart !== null && $tagEnd !== null && $tagEnd > $tagStart )
	{
		// tag detected
		$tagTxt = trim(substr($name, $tagStart));

		$tagTxt = substr($tagTxt, 1, -1);
		$tagsList = explode(',', $tagTxt);
		$thisMovie['tags'] = $tagsList;

		// remove tag from name
		$name = trim(substr($name, 0, strlen($name) - $tagStart));
	}

	$thisMovie['title'] = $name;

	// add to array
	$movies[$filename] = $thisMovie;
}
?>