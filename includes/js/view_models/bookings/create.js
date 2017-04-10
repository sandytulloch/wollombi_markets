function sandy_rulz(){
	alert('sandy rulz');
}

var ViewModel = function(data) {
	var self = this;

	self.table = null;
	self.initialData = data;
	self.sites = ko.observableArray();
	self.user = new RecordViewModel(data.user);

	self.generateArrays = function(){
		for(var i in data.sites){
			data.sites[i].selected = false;
			self.sites.push(new RecordViewModel(data.sites[i]));
		}
	}


	self.init = function() {
		self.generateArrays();
		self.refreshDatatable();


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

};

var RecordViewModel = function(data){
	var self = this;
	self.initialData = data;
	for(i in data){
		self[i] = ko.observable(data[i]);
	}
}