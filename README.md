# New Tube

You have a problem with youtube kids and need online youtube?

This is yours. NewTube!

Simply clone the project and put your mp4 video & cover image inside media folder. we detect and list them.

## Installation

If you want to direct download from youtube you need to do below instructions. else skip this step.

-   install [youtube-dl](https://ytdl-org.github.io/youtube-dl/download.html)

If you are use Windows, only need to add full path of repository `lib` folder to your system PATH.


Go inside lib folder then run below command

-   run `composer i` or `composer install`


### YouTube Downloader Usage

```
php youtube-dl.php -l LINK -l ANOTHER_LINK -l ANOTHER_ONE
```

for example download Baby Shark Doo Doo Doo Doo Doo Doo...

```
php youtube-dl.php -l https://www.youtube.com/watch?v=XqZsoesa55w
```

#### issues

-   you can pass playlist link as link but log output is not good for playlis
