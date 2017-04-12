function sandy_rulz(){
	alert('sandy rulz');
}

var ViewModel = function(data) {
	var self = this;

	self.table = null;
	self.initialData = data;
	self.sites = ko.observableArray();
	self.user = new RecordViewModel(data.user);
	self.site_areas = [];
	self.selected_sites = ko.observableArray();

	self.generateArrays = function(){
		for(var i in data.sites){
			data.sites[i].selected = false;
			self.sites.push(new RecordViewModel(data.sites[i]));
		}
	}


	self.init = function() {
		self.generateArrays();
		self.refreshDatatable();
		self.setup_map();
		setInterval(refreshSites, 1000 * 30);

	};

	self.refreshDatatable = function() {
		self.table = $("#structuresTable").DataTable({
			stateSave: true
	        // "pagingType": "full_numbers"
		});

		/*$("#structuresTable tfoot th").each(function(){
			var title = $("#structuresTable tfoot th").eq($(this).index()).text();
			$(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');
		});

		self.table.columns().eq(0).each( function ( colIdx ){
			$('input', self.table.column( colIdx ).footer() ).on ('keyup change', function(){
				self.table
					.column(colIdx)
					.search(this.value)
					.draw();
			});
		});*/

		$("#structuresTable").on('click', 'tbody tr', function(e){
			//alert($(this).attr('data-structureId'));
			// alert('sup');
			window.document.location = $(this).attr('data-url');
		});
	};

	self.book_selected_sites = function(){
		$("#details_model").modal('show');
	}

	self.remove_selected = function(data){
		console.log(data);
		for(var i in drawnItems._layers){
			if(typeof drawnItems._layers[i].data == 'object'){
				if(drawnItems._layers[i].data.id() == data.id()){
					drawnItems._layers[i].selected = false;
					colour = getStatusColour(drawnItems._layers[i]);
					drawnItems._layers[i].setStyle({color:colour});
				}
			}
		}
		for(var i in self.selected_sites()){
			if(self.selected_sites()[i].id() == data.id()){
				self.selected_sites.remove(self.selected_sites()[i]);
				break;
			}
		}
	}

	self.setup_map = function(){
		map = L.map('map', {
		  minZoom: 7,
		  maxZoom: 8,
		  center: [0, 0],
		  zoom: 7,
		  crs: L.CRS.Simple
		});

		// dimensions of the image
		var w = 583,
		    h = 438,
		    url = '../includes/images/wollombi_park.png';

		// calculate the edges of the image, in coordinate space
		var southWest = map.unproject([0, h], map.getMaxZoom()-1);
		var northEast = map.unproject([w, 0], map.getMaxZoom()-1);
		var bounds = new L.LatLngBounds(southWest, northEast);

	    drawnItems = new L.FeatureGroup();
	    map.addLayer(drawnItems);
	    var drawControl = new L.Control.Draw({
	        edit: {
	            featureGroup: drawnItems
	        }
	    });
	    // map.addControl(drawControl);
	    map.on("draw:created", function(e){
	    	var poly = [];
			for(var x in e.layer._latlngs[0]){
				poly.push([e.layer._latlngs[0][x].lat, e.layer._latlngs[0][x].lng]);
			}
			console.log(self.site_areas.push(JSON.stringify(poly)));
		});

		for(var x in self.sites()){
			
			var rect = L.rectangle(JSON.parse(self.sites()[x].outline()), {color: getStatusColour({selected:false, data:self.sites()[x]}), weight: 1});
			rect.data = self.sites()[x];
			rect.selected = false;
			rect.on('click', function(e){
				refreshSites();
				if(e.target.data.Status()=="Empty"){
				self.selected_sites.push(e.target.data);
				e.target.selected = true;
				e.target.setStyle({color: getStatusColour(e.target)})
				}
			})

			rect.on('mouseover', function(e){
				var highlight_colour = "#20B2AA";
				e.target.setStyle({color: highlight_colour});
			});
			rect.on('mouseout', function(e){

				e.target.setStyle({color: getStatusColour(e.target)});
				// console.log(e.target.setStyle);
			});
			rect.addTo(drawnItems);
		}
		// add the image overlay, 
		// so that it covers the entire map
		L.imageOverlay(url, bounds).addTo(map);

		// tell leaflet that the map is exactly as big as the image
		map.setMaxBounds(bounds);
	}

};

var RecordViewModel = function(data){
	var self = this;
	self.initialData = data;
	for(i in data){
		self[i] = ko.observable(data[i]);
	}
}

function getStatusColour(data){
	if(data.selected){
		return '#00ffff';
	}
	else if(data.data.Status() == "Reserved"){
		return "#FFA500";
	}
	else if(data.data.Status() == "Booked"){
		return "#FF4500";
	}
	else{
		return "#7FFF00";
	}
}

function refreshSites(){
	$.get(
		'./updateSites',
		function(data){
			console.log(data);
			for(var x in data){
				for(var z in model.sites()){
					if(model.sites()[z].id() == data[x].id){
						if(model.sites()[z].Status() != data[x].Status){
							
							model.sites()[z].Status(data[x].Status);
							if(data[x].State != "Empty"){
								model.remove_selected(new RecordViewModel(data[x]));
							}
							for(var i in drawnItems._layers){
								if(typeof drawnItems._layers[i].data == 'object'){
									if(drawnItems._layers[i].data.id() == data.id){
										drawnItems._layers[i].Status(data[x].Status);
									}
								}
							}
							console.log()

						}
					}
				}
			}
		}
		);
}