$(document).ready(function() {
	console.log("HERE");
	table = $("#testTable").DataTable();


	$('a.toggle-vis').on('click', function (e){
		e.preventDefault();
		var column = table.column($(this).attr('data-column'));
		column.visible(! column.visible());
	})

	$("#testTable tfoot th").each(function(){
		var title = $("#testTable tfoot th").eq($(this).index()).text();
		$(this).html('<input type="text" placeholder="Search ' + title + '" />');
	});

	table.columns().eq(0).each( function ( colIdx ){
		$('input', table.column( colIdx ).footer() ).on ('keyup change', function(){
			table
				.column(colIdx)
				.search(this.value)
				.draw();
		});
	});
});