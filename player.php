	<video
	    id="my-player"
	    class="video-js rounded-lg w-full	mb-2"
	    controls
	    autoplay
	    preload="auto"
<?php if($thisVid['path']) {?>
	    poster="<?php echo $thisVid['poster'] ?>"
<?php }?>
	    data-setup='{}'>
	  <source src="<?php echo $thisVid['path'] ?>" type="video/mp4"></source>
	  <p class="vjs-no-js">
	    To view this video please enable JavaScript, and consider upgrading to a
	    web browser that <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
	  </p>
	</video>

	<div class="grid grid-cols-6 gap-2">
	  <div class="mb-2">
	  	<img class="rounded-lg" alt="cover" src="img/mov_rel_9225_452-m.jpg">
	  </div>
	  <div class="mb-2">
	  	<img class="rounded-lg" alt="cover" src="img/mov_rel_9600_696-m.jpg">
	  </div>
	  <div class="mb-2">
	  	<img class="rounded-lg" alt="cover" src="img/mov_rel_9611_433-m.jpg">
	  </div>
	  <div class="mb-2">
	  	<img class="rounded-lg" alt="cover" src="img/mov_rel_9541_360-m.jpg">
	  </div>
	  <div class="mb-2">
	  	<img class="rounded-lg" alt="cover" src="img/mov_rel_9600_696-m.jpg">
	  </div>
	  <div class="mb-2">
	  	<img class="rounded-lg" alt="cover" src="img/mov_rel_9611_433-m.jpg">
	  </div>
	</div>