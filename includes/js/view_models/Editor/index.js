var ViewModel = function() {
	var self = this;

	self.table = null;

	self.init = function() {
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

};

