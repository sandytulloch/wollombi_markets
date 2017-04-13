

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
        <a data-toggle="collapse" href="#collapse2">Selected Sites</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse">
      <div class="panel-body">
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
<<<<<<< HEAD
      <div class="modal-body" data-bind=" with: $root.booking_info">
      <h4>Contact Details</h4>
        <div class="field-container">  
          <input type="text" class="field" required placeholder="Contact Name" data-bind="textInput: contact_name"/>
          <label class="floating-label">Contact Name</label> 
          <div class="field-underline"></div>
        </div>
        <div class="field-container">  
          <input type="text" class="field" required placeholder="Business Name" data-bind="textInput: business_name"/>
          <label class="floating-label">Business Name</label> 
          <div class="field-underline"></div>
        </div>
        <div class="field-container">  
          <textarea type="text" class="field" rows="1" required placeholder="Address" onkeyup="auto_grow(this)" data-bind="textInput: address"></textarea> 
          <label class="floating-label">Address</label> 
          <div class="field-underline"></div>
        </div>
        <div class="field-container">  
          <input type="text" class="field" required placeholder="Phone" data-bind="textInput: phone"/>
          <label class="floating-label">Phone</label> 
          <div class="field-underline"></div>
        </div>
        <br>
        <h4>Stall Information</h4>
        <div class="field-container">  
          <input type="text" class="field" required placeholder="What products are you selling?" data-bind="textInput: product_type"/>
          <label class="floating-label">What products are you selling?</label> 
          <div class="field-underline"></div>
        </div>

=======
      <div class="modal-body">
       	<form>
       		<input type='text' data-bind=' first_name'/>
       	</form>
>>>>>>> refs/remotes/origin/dev
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Reserve to Buy</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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