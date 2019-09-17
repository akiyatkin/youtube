Youtube = {
	layers:{},
	getVideoLayer: function (id) {
		if (this.layers[id]) return this.layers[id];
		var layer = {
			"external":"-youtube/video.layer.json",
			"config":{
				"id":id
			}
		}
		
		this.layers[id] = layer;
		return layer;
	},
	popup: function (id) {
		var layer = this.getVideoLayer(id);
		popup.open(layer);
		/*infrajs.code_save('youtube-video','Youtube.popup("'+id+'");');
		Event.one('layer.onhide', function () {
			infrajs.code_remove('youtube-video');
		}, '', layer);*/
	}
}