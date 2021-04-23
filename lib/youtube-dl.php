<?php

require __DIR__ . "/vendor/autoload.php";

use YoutubeDl\Options;
use YoutubeDl\YoutubeDl;

if (isset($_GET["import"])) {
} else {
    $arguments = getopt("l:");

    if (!isset($arguments["l"])) {
        die("ERROR : there is no `-l LINK`");
    }
    if (!is_array($arguments["l"])) {
        $arguments["l"] = [$arguments["l"]];
    }
    foreach ($arguments["l"] as $url) {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            echo "`" . $url . "` is not a valid url \n";
            continue;
        }
        echo "downloading... \n";
        download_link($url);
        echo "\n";
    }
    die();
}

/**
 * https://github.com/norkunas/youtube-dl-php
 */
function download_link(string $_link): void
{
    @ini_set("max_execution_time", "900"); //900 seconds = 15 minutes
    @set_time_limit(900);

    $yt = new YoutubeDl();

    $collection = $yt->download(
        Options::create()
            ->downloadPath(__DIR__ . "/../media/download")
            ->format("bestvideo+bestaudio")
            ->mergeOutputFormat("mp4")
            ->writeThumbnail(true)
            ->url($_link)
    );

    foreach ($collection->getVideos() as $video) {
        if ($video->getError() !== null) {
            echo "Error downloading {$_link}: {$video->getError()}.";
        } else {
            echo "complete : " . $video->getTitle();
            // $video->getFile();
        }
    }
}
