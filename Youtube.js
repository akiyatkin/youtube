Youtube = {
	layers:{},
	simples:{},
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
	getSimpleLayer: function (id) {
		if (this.simples[id]) return this.simples[id];
		var layer = {
			"tpl":"-youtube/youtube.tpl",
			"tplroot":"simple",
			"config":{
				"id":id
			}
		}
		
		this.simples[id] = layer;
		return layer;
	},
	simple: function (id){
		var layer = this.getSimpleLayer(id);
		popup.open(layer);
	},
	popup: function (id) {
		var layer = this.getVideoLayer(id);
		popup.open(layer);
	}
}