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
	self.booking_info = ko.observable(new RecordViewModel({
		contact_name: '',
		business_name: '',
		address:'',
		phone: '',
		product_type:''
	}));

	self.time_remaining = ko.observable();

	self.generateArrays = function(){
		for(var i in data.sites){
			data.sites[i].selected = false;
			var site = new SiteViewModel(data.sites[i]);

			self.sites.push(site);
		}
	}

	self.time_remaining_func = function(){
		var time_taken = new Date() - new Date(self.initialData.reservation.reserve_start_time);
		var time_remaining = 30*60*1000 - time_taken;
		var time_remaining_formatted = moment(time_remaining).format('mm:ss');
		self.time_remaining(time_remaining_formatted);
	}


	self.init = function() {
		self.generateArrays();
		self.refreshDatatable();
		self.setup_map();
		setInterval(self.refreshSites, 1000 * 10);
		self.drawSites();
		setInterval(self.time_remaining_func, 1000);

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

	self.show_tc = function(){
		$("#details_model").modal('hide');
		$("#tc_modal").modal('show');
		$(".modal-body-tc").height($(window).height()*.65);
	}





	// self.remove_selected = function(data){
	// 	console.log(data);
	// 	for(var i in drawnItems._layers){
	// 		if(typeof drawnItems._layers[i].data == 'object'){
	// 			if(drawnItems._layers[i].data.id() == data.id()){
	// 				drawnItems._layers[i].selected = false;
	// 				colour = getStatusColour(drawnItems._layers[i]);
	// 				drawnItems._layers[i].setStyle({color:colour});
	// 			}
	// 		}
	// 	}
	// 	for(var i in self.selected_sites()){
	// 		if(self.selected_sites()[i].id() == data.id()){
	// 			self.selected_sites.remove(self.selected_sites()[i]);
	// 			break;
	// 		}
	// 	}
	// }

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
	 //    map.on("draw:created", function(e){
	 //    	var poly = [];
		// 	for(var x in e.layer._latlngs[0]){
		// 		poly.push([e.layer._latlngs[0][x].lat, e.layer._latlngs[0][x].lng]);
		// 	}
		// 	console.log(self.site_areas.push(JSON.stringify(poly)));
		// });


		// add the image overlay, 
		// so that it covers the entire map
		L.imageOverlay(url, bounds).addTo(map);

		// tell leaflet that the map is exactly as big as the image
		map.setMaxBounds(bounds);
	}

	self.drawSites = function (){

		for(var x in self.sites()){

			var rect = L.rectangle(JSON.parse(self.sites()[x].outline()), {weight: 1});
			rect.data = self.sites()[x];
			// rect.selected = false;
			rect.on('click', function(e){
				e.target.data.updateReservedStatus();
				console.log(e);
				// self.reserve_site(e.target.data.id());

			})

			rect.on('mouseover', function(e){
				var highlight_colour = "#20B2AA";
				e.target.setStyle({color: highlight_colour});
			});
			rect.on('mouseout', function(e){

				e.target.setStyle({color: getStatusColour(e.target.data)});
				// console.log(e.target.setStyle);
			});
			rect.addTo(drawnItems);

			self.sites()[x].feature = rect;

		}
		self.refreshSites();

	}

	self.refreshSites = function(){
		$.get(
				'./updateSites',
				function(data){
					for(var i in self.sites()){
						self.sites()[i].Status(data[self.sites()[i].id()]['Status']);
						self.sites()[i].selected(self.sites()[i].Status() == 'Reserved' && data[self.sites()[i].id()]['held_by'] == self.user.id());
					}
					self.refreshFeatures();
				}
			)
	}

	self.refreshFeatures = function(){
		for(var i in self.sites()){
			// console.log(self.sites()[i].id(), getStatusColour(self.sites()[i]));
			self.sites()[i].feature.setStyle({color:getStatusColour(self.sites()[i])})
		}
	}

};

var RecordViewModel = function(data){
	var self = this;
	self.initialData = data;
	for(i in data){
		self[i] = ko.observable(data[i]);
	}
}

var SiteViewModel = function(data){
	var self = this;
	self.initialData = data;
	for(i in data){
		self[i] = ko.observable(data[i]);
	}

	// self.selected.subscribe(function(newValue){
	// 	console.log(newValue);
	// 	self.updateReservedStatus(self.id(), newValue);
	// }, null, "beforeChange");




	self.updateReservedStatus = function(site, status){
		$.get(
			'../bookings/updateReservedStatus/'+self.id()+'/'+!self.selected(),
			function(response){
				if(response.result){
					console.log(response); //Add SWAL
				} else {
					console.log('refreshing');
					model.refreshSites();
				}
			}
		)
	}

}

function getStatusColour(data){
	if(data.selected()){
		return '#00ffff';
	}
	else if(data.Status() == "Reserved"){
		return "#FFA500";
	}
	else if(data.Status() == "Booked"){
		return "#FF4500";
	}
	else{
		return "#7FFF00";
	}
}



// function refreshSites(){
// 	$.get(
// 		'./updateSites',
// 		function(data){
// 			console.log(data);
// 			for(var x in data){
// 				for(var z in model.sites()){
// 					if(model.sites()[z].id() == data[x].id){
// 						if(model.sites()[z].Status() != data[x].Status){
							
// 							model.sites()[z].Status(data[x].Status);
// 							if(data[x].State != "Empty"){
// 								model.remove_selected(new RecordViewModel(data[x]));
// 							}
// 							for(var i in drawnItems._layers){
// 								if(typeof drawnItems._layers[i].data == 'object'){
// 									if(drawnItems._layers[i].data.id() == data.id){
// 										drawnItems._layers[i].Status(data[x].Status);
// 									}
// 								}
// 							}
// 							console.log()

// 						}
// 					}
// 				}
// 			}
// 		}
// 		);
// }

function auto_grow(element) {

	count = (model.booking_info().address().match(/\n/g)||[]).length;
    $(element).animate({height: (count + 1) *35 + 'px'}, 100);

}