

<!-- ko foreach: sites -->
	<label data-bind='text: number'></label>
	<input type='checkbox'></input>
	<span data-bind="text: Status"></span>
	<br/>
<!-- /ko -->

<button class='btn btn-success' data-bind='click: function(){book_selected_sites()}'>Book these sites</button>



<!-- Modal -->
<div id="details_model" class="modal fade" role="dialog" data-bind='with: user'>
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Booking Details</h4>
      </div>
      <div class="modal-body">
       	<form>
       		<input type='text' data-bind='textInput: first_name'/>
       	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<script>
	$(document).ready(function() {
		model = new ViewModel(<?php echo json_encode($data) ?>);
		ko.applyBindings(model);

		model.init();
	})
</script>