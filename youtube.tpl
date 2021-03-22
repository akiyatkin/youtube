{simple:}
	<style>
		.modal-dialog {
	    	max-width: 800px;
	    }
	</style>
	<div style="min-width:50%"></div>
	<div class="embed-responsive embed-responsive-16by9">
  		<iframe class="embed-responsive-item" width="960" height="720" src="https://www.youtube.com/embed/{config.id}?autoplay=1&amp;controls=1&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
  	</div>
{video:}
	<h1>{data.data.title}</h1>
	<div class="embed-responsive embed-responsive-16by9">
  		<iframe class="embed-responsive-item" width="960" height="720" src="https://www.youtube.com/embed/{config.id}?autoplay=1&amp;controls=1&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
  	</div>
  	<p>{data.data.description}</p>
{list:}
	{~length(data.list)?:body}
{body:}
	<div class="panel-body youtube-list">
		<h1 style="margin-top:0">Видео</h1>
		{data.list::item}
		<script type="module">
			import { Code } from '/vendor/infrajs/memcode/Code.js'
			import { Youtube } from '/vendor/akiyatkin/youtube/Youtube.js'
			
			//Event.one('Controller.onshow', function () {
				
				Code.remove('youtube-video');
				$('.youtube-list').find('.a').click( function () {
					var id=$(this).data('id');
					Youtube.popup(id);
				});
			//});
			
		</script>
	</div>
{item:}
	<h3>{title}</h3>
	<span class="a" data-id="{id}">
		<img class="img-fluid" src="/-imager/?src={img}&w=480&h=270&crop=1">
	</span>
{mp4:}
	<style>
		.modal-dialog {
	    	max-width: 800px;
	    }
	</style>
	<div class="embed-responsive embed-responsive-16by9">
		<video class="embed-responsive-item" src="{config.src}" controls autoplay></video>
	</div>