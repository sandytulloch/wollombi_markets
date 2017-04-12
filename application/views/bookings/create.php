

<div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse1">View Avaliable Sites</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse">
      <div class="panel-body" id="map" style="height: 438px;">
        
      </div>
    </div>
  </div>
</div>

<div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse1">Selected Sites</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse">
      <div class="panel-body"">
        <table class="table">
          <thead>
            <tr>
              <th>Site Number</th>
              <th>Price</th>
              <th></th>
            </tr>
          </thead>
          <tbody data-bind="foreach:selected_sites">
            <tr>
              <th data-bind="text: $data.number"></th>
              <th>$40</th>
              <th><a data-bind="click:function(){$root.remove_selected($data)}" class="btn btn-danger">Remove</a></th>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

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
       		<input type='text' data-bind=' first_name'/>
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