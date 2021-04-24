 window.HELP_IMPROVE_VIDEOJS = false;
 videojs.options.autoplay = true;

if (document.getElementById("newtube-player"))
{
	let player = videojs('newtube-player');

	player.on('play', function()
	{
		var seperateAudio = document.getElementById("newtube-audio");
		if(seperateAudio)
		{
			seperateAudio.currentTime = player.currentTime();
			seperateAudio.play();
		}
	});

	player.on('pause', function()
	{
		var seperateAudio = document.getElementById("newtube-audio");
		if(seperateAudio)
		{
			seperateAudio.pause();
		}
	});

	player.on('ended', function()
	{
		var seperateAudio = document.getElementById("newtube-audio");
		if(seperateAudio)
		{
			seperateAudio.pause();
			// seperateAudio.stop();
		}

		var NextVid = document.getElementById("recommendNext0");
		if(NextVid && NextVid.href)
		{
			location.replace(NextVid.href);
		}
	});

}
