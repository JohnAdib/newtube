<?php if(allow_import()) {?>
<div class="p-10">
<?php if(isset($_GET["import"])  && $_GET["import"]) {?>
	<p class="text-xl">Import from YouTube</p>

  <a class="p-5 block " target="_blank" href="<?php echo $_GET["import"]; ?>"><?php echo $_GET["import"]; ?></a>
<?php
    if (!filter_var($_GET["import"], FILTER_VALIDATE_URL)) {
        echo "`" . $_GET["import"] . "` is not a valid url \n";
    }
    else
    {
      echo "<p>downloading...</p>";
      require "lib/youtube-dl.php";
      download_link($_GET["import"]);
    }
?>
<p><a href="<?php echo getUrl_wo_params(); ?>?import" class="w-full sm:w-auto flex-none bg-gray-900 hover:bg-gray-700 text-white text-lg leading-6 font-semibold py-3 px-6 border border-transparent rounded-xl focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-gray-900 focus:outline-none transition-colors duration-200 mt-5 inline-block">Import New Video</a></p>
<?php } else {?>
  <p>Paste your YouTube video link</p>
  <form class="relative mt-2" method="get" action="<?php echo getUrl_wo_params() ?>">
  	<div class="relative">
    	<button class="absolute left-3 top-1/2 outline-none">
    	<svg width="20" height="20" fill="currentColor" class="outline-none transform -translate-y-1/2 text-gray-400">
      	<path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
    	</svg>
    	</button>
    	<input name="import" class="focus:border-light-blue-500 focus:ring-1 focus:ring-light-blue-500 focus:outline-none w-full text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md py-2 pl-10" type="text" aria-label="YouTube Link" placeholder="YouTube Link" />
  	</div>
  </form>
<?php }?>
</div>
<?php } else {?>
  <p>Import is disabled!</p>
<?php }?>