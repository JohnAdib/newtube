<?php
$MOVIES = [];
$TAGS   = [];

foreach (glob("media/{,*/,*/*/}*.mp4", GLOB_BRACE) as $_filePath)
{
	$id = md5($_filePath);
	$filename = substr(basename($_filePath), 0, -4);
	$thisMovie =
	[
		'path'    => $_filePath,
		'poster'  => null,
		'name'    => $filename,
		'size'    => round(filesize($_filePath) / 1024 / 1024, 1). 'MB',
		'id'      => $id,
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
	elseif(substr($qualityTxt, -6) === '_1080p')
	{
		// we detect quality
		$thisMovie['quality'] = intval(substr($qualityTxt, -5, -1));
		$name = trim(substr($name, 0, -6));
	}
	elseif(substr($qualityTxt, -5) === '_720p')
	{
		// we detect quality
		$thisMovie['quality'] = intval(substr($qualityTxt, -4, -1));
		$name = trim(substr($name, 0, -5));
	}

	// detect tag
	$tagsList = [];
	$tagStart = strpos($name, '{');
	$tagEnd = strpos($name, '}');

	if($tagStart !== null && $tagEnd !== null && $tagEnd > $tagStart )
	{
		// tag detected
		$tagTxt = trim(substr($name, $tagStart));

		$tagTxt = substr($tagTxt, 1, -1);
		$tagsList = explode(',', $tagTxt);

		// remove tag from name
		$name = trim(substr($name, 0, -(strlen($name) - $tagStart)));
	}

	$tag1 = check_pre_define_tags($name);
	if($tag1)
	{
		array_push($tagsList, $tag1);
	}

	foreach ($tagsList as $key => $myTag)
	{
		$mySlug = create_slug($myTag);
		$tagsList[$key] = $mySlug;
		$TAGS[$mySlug][] = $id;
	}

	// save tags for this video
	$thisMovie['tags'] = $tagsList;

	$thisMovie['title'] = $name;
	// add to array
	$MOVIES[$id] = $thisMovie;
}

file_put_contents("data/all.data.json",json_encode($MOVIES, JSON_PRETTY_PRINT));
file_put_contents("data/tags.data.json",json_encode($TAGS, JSON_PRETTY_PRINT));

?>