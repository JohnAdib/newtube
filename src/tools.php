<?php
function getUrl()
{
  $url  = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];
  $url .= ( $_SERVER["SERVER_PORT"] !== 80 ) ? ":".$_SERVER["SERVER_PORT"] : "";
  $url .= $_SERVER["REQUEST_URI"];
  return $url;
}


function getUrl_wo_params()
{
  $url = getUrl();
  $url = strtok($url, '?');
  return $url;
}


function createUrl_id($_id)
{
	$url = getUrl_wo_params();
	$url .= '?id='. $_id;
  return $url;
}


function createUrl_tag($_tag)
{
  $url = getUrl_wo_params();
  $url .= '?tag='. $_tag;
  return $url;
}

function create_slug($_string)
{
  // clear tag
  $myTag = trim($_string);
  $myTag = trim($myTag, '"');
  $myTag = trim($myTag, "'");
  $myTag = trim($myTag, ";");

  $myTagSlug = strtolower($myTag);
  $myTagSlug = str_replace(' ', '-', $myTagSlug);

  return $myTagSlug;
}

function slug_show($_slug)
{
  $myTag = str_replace('-', ' ', $_slug);
  $myTag = ucwords($myTag);

  return $myTag;
}

?>