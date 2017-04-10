<?php if(isset($record['ID']) && $record['ID']): ?>
  <h4>Edit a Client record</h4>
<?php else: ?>
  <h4>Add a Client record</h4>
<?php endif; ?>
<br/>

<?php
$fields = 
	[
		[
			'name' => 'ID',
			'type' => 'number'
		], 
		[
			'name' => 'Client',
			'type' => 'text',
			'placeholder' => 'Enter client name'
		], 
		[
			'name' => 'Year',
			'type' => 'number'
		] , 
		[
			'name' => 'FS',
			'type' => 'checkbox'
		] 
	]
?>


<form id="newExternalForm" class="form-horizontal" role="form"  action='<?= base_url();?>Clients/save' method="post">

  <div class="form-group">
    <label class="control-label col-sm-2" for="ID">ID:</label>
    <div class="col-sm-10">
      <input type="number" name='ID' class="form-control" id="ID"  data-bind='value: ID'  readonly="readonly">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="Client">Client:</label>
    <div class="col-sm-10"> 
      <input type="text" name='Client' class="form-control" id="Client" placeholder="Enter client name" data-bind='value: Client'>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="Year">Year:</label>
    <div class="col-sm-10"> 
      <input type="number"  name='Year' class="form-control" id="Year" placeholder="Enter latest year of record" data-bind='value: Year'>
    </div>
  </div>


  <div class="form-group">
    <label class="control-label col-sm-2" for="Box">Box:</label>
    <div class="col-sm-10"> 
      <input type="text" name='Box' class="form-control" id="Box" placeholder="Enter box number" data-bind='value: Box'>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="Contents">Contents:</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" name='Contents' id="Contents" data-bind='value: Contents'  readonly="readonly" required>
    </div>
  </div>

<?php $checkboxes = array('FS', 'ITR', 'COR', 'WP', 'LT', 'Other') ?> 

  <div class="form-group">
	<?php foreach($checkboxes as $type): ?>
	    <div class="col-sm-offset-2 col-sm-10">
	      <div class="checkbox">
	        <label><input type="checkbox" value='1' data-bind='checked: <?=$type?>'><?=$type?></label>
          <input type="hidden" name='<?=$type?>' data-bind='value: <?=$type?>'>
	        <?php if($type == 'Other'): ?>
	        	<input type="text" name='Other_Description' class="form-control" id="Other_Description" data-bind='value: $data["Other_Description"], visible: Other, valueUpdate: "keyup" '>
	        <?php endif; ?>
	      </div>
	    </div>
	<?php endforeach; ?>
 		
  </div>



  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <?php if(isset($record['ID']) && $record['ID']): ?>
        <button type="submit" class="btn btn-success">Save</button>
        <button onclick='window.history.back()' class="btn btn-warning">Cancel</button>
        <button type='submit' value='Danger' name='deleted' class="btn btn-danger">Delete</button>
      <?php else: ?>
        <button type="submit" class="btn btn-success">Submit</button>
        <button type='button' onclick='window.history.back()' class="btn btn-warning">Cancel</button>
      <?php endif; ?>
    </div>
  </div>
</form>



<script>
	$(document).ready(function() {
		model = new RecordViewModel(<?php echo json_encode($record) ?>);
		ko.applyBindings(model);

		model.init();
	})
</script>