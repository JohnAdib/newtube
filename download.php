<?php

require __DIR__ . "/vendor/autoload.php";

use YoutubeDl\Options;
use YoutubeDl\YoutubeDl;

$yt = new YoutubeDl();

$collection = $yt->download(
    Options::create()
        ->downloadPath(__DIR__ . "/media")
        ->mergeOutputFormat("mp4")
        ->writeThumbnail(true)
        ->url("https://www.youtube.com/watch?v=oDAw7vW7H0c")
);

foreach ($collection->getVideos() as $video) {
    if ($video->getError() !== null) {
        echo "Error downloading video: {$video->getError()}.";
    } else {
        echo $video->getTitle(); // Will return Phonebloks
        // $video->getFile(); // \SplFileInfo instance of downloaded file
    }
}
