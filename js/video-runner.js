 window.HELP_IMPROVE_VIDEOJS = false;
 videojs.options.autoplay = true;

if (document.getElementById("newtube-player"))
{
	let player = videojs('newtube-player');

	player.on('ended', function()
	{

		var NextVid = document.getElementById("recommendNext0");
		if(NextVid && NextVid.href)
		{
			location.replace(NextVid.href);
		}

	});

}
