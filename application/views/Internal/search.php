

<table id='recordsTable' class='table'>

</table>


<script>
	$(document).ready(function() {
		model = new ViewModel(<?php echo json_encode($records) ?>);
		ko.applyBindings(model);

		model.init();
	})
</script>