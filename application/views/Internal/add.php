<?php if(isset($record['ID']) && $record['ID']): ?>
  <h4>Edit a Internal (GTB) record</h4>
<?php else: ?>
  <h4>Add a Internal (GTB) record</h4>
<?php endif; ?>
<br/>




<form id="newExternalForm" class="form-horizontal" role="form"  action='<?= base_url();?>Internal/save' method="post">

  <div class="form-group">
    <label class="control-label col-sm-2" for="ID">ID:</label>
    <div class="col-sm-10">
      <input type="number" name='ID' class="form-control" id="ID"  data-bind='value: ID'  readonly="readonly">
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

  <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
          <label>Category: </label>
          <select name = 'InternalType' data-bind="value: InternalType, optionsCaption: 'Select Category'">
            <option value ='undefined'>Select Category</option>
            <optgroup label="Banking">
              <option value="Bank Deposit Slips">Bank Deposit Slips</option>
              <option value="Bank Deposit Books">Bank Deposit Books</option>
              <option value="Cheque Requisition">Cheque Requisition</option>
              <option value="Cheque Book">Cheque Book</option>
              <option value="EFT Requisition">EFT Requisition</option>
              <option value="Bank Statements">Bank Statements</option>
            </optgroup>
            <optgroup label="Billing">
              <option value="Invoices">Invoices</option>
              <option value="Billing Input Form">Billing Input Form</option>
              <option value="WIP Adjustment">WIP Adjustment</option>
              <option value="Monthly Debtor Report">Monthly Debtor Report</option>
            </optgroup>
            <optgroup label="Employee Details">
              <option value="Employee Details">Employee Details</option>
              <option value="Salaries">Salaries</option>
            </optgroup>
            <optgroup label="Other">
              <option value="ELS Lodgement">ELS Lodgement</option>
              <option value="Fax Verification">Fax Verification</option>
              <option value="ELDs">ELDs</option>
              <option value="Other">Other</option>
            </optgroup>
          </select>

          <br/>
          <label>Date Start: </label>
          <input type="text" name='DateStart' id="DateStart" data-bind='value: DateStart'><label>DD/MM/YYYY</label>

          <br/>
          <label>Date Finish: </label>
          <input type="text" name='DateFinish' id="DateFinish" data-bind='value: DateFinish'><label>DD/MM/YYYY</label>

          <br/>
          <label>Number Start: </label>
          <input type="text" name='NumberStart' id="NumberStart" data-bind='value: NumberStart'>

          <br/>
          <label>Number Finish: </label>
          <input type="text" name='NumberFinish' id="NumberFinish" data-bind='value: NumberFinish'>

          <br/>
          <label>Bank Account: </label>
          <select  name = 'BankAccount' data-bind="value: BankAccount">
              <option value="">Select Account</option>
              <option value="Gauld Tulloch Bove Pty Ltd">Gauld Tulloch Bove Pty Ltd</option>
              <option value="GTB Services">GTB Services</option>
              <option value="AET Products">AET Products</option>
              <option value="Trust">Trust</option>
              <option value="Other">Other</option>

          </select>

          <br/>
          <label>Description: </label>
          <input type="text" name='DescriptionText' id="DescriptionText" data-bind='value: DescriptionText'>

      </div>
  </div>


<?php $checkboxes = array('Confidential')//$checkboxes = array('FS', 'ITR', 'COR', 'WP', 'LT', 'Other') ?> 

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