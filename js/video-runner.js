 window.HELP_IMPROVE_VIDEOJS = false;
 videojs.options.autoplay = true;

let player = videojs('newtube-player');

player.on('ended', function()
{

	var NextVid = document.getElementById("recommendNext0");
	if(NextVid && NextVid.href)
	{
		location.replace(NextVid.href);
	}

});
