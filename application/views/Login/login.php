<div class="col-xs-12">
	<br><br>
	<div style="text-align: center" >
		<h1>Login to Your Account</h1><br>
		<?php echo validation_errors(); ?>
        <?php echo form_open('verifylogin/index'); ?>

            <div class="field-container" style="margin: 0 auto;">  
		        <input type="text" class="field" required placeholder="Email" name="username"/>
		        <label class="floating-label">Email</label>
	        </div>
	        <div class="field-container" style="margin: 0 auto; margin-top: 30px">  
		        <input type="password" class="field" required placeholder="Password" name="password"/>
		        <label class="floating-label">Password</label> 
	        </div>
			<br>
			<input type="submit" class="btn btn-primary" name="login" value="Login">
		</form>
		<br>
		<div class="login-help">
			<a href="#" data-toggle="modal" data-target="#new_user_modal">Register</a> - <a href="#">Forgot Password</a>

		</div>
	</div>
</div>



<!-- Modal -->
<div id="new_user_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">New User</h2>
      </div>
	      <div class="modal-body">
  			<form id='new_user' action="<?=base_url('Login/create')?>" method='POST'>
				<div class="field-container" style="margin: 0 auto;">  
			        <input type="text" class="field" required placeholder="Email" name="username" data-bind="textInput:email"/>
			        <label class="floating-label">Email</label>
		        </div>
		        <div class="field-container" style="margin: 0 auto; margin-top: 30px">  
			        <input type="password" class="field" required placeholder="Password" name="password" data-bind="textInput:p1"/>
			        <label class="floating-label">Password</label> 
		        </div>
		        <div class="field-container" style="margin: 0 auto; margin-top: 30px">  
			        <input type="password" class="field" required placeholder="Confirm Password" name="password" data-bind="textInput:p2"/>
			        <label class="floating-label">Confirm Password</label> 
		        </div>

				<div class="field-container" style="margin: 0 auto; margin-top: 30px">  
			        <input type="text" class="field" required placeholder="First Name" name="first_name" data-bind="textInput:first_name"/>
			        <label class="floating-label">First Name</label>
		        </div>

				<div class="field-container" style="margin: 0 auto; margin-top: 30px"> 
			        <input type="text" class="field" required placeholder="Last Name" name="last_name" data-bind="textInput:last_name"/>
			        <label class="floating-label">Last Name</label>
		        </div>

				<div class="field-container" style="margin: 0 auto; margin-top: 30px">  
			        <input type="text" class="field" required placeholder="Phone Number" name="phone_number" data-bind="textInput:phone"/>
			        <label class="floating-label">Phone Number</label>
		        </div>

			  </form>
	      
	      </div>
	      <div class="modal-footer">
	      	<button type="button" class="btn btn-success" data-dismiss="modal" data-bind="enable: valid, click:function(){submit_form()}">Register</button>
	      	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	        
	      </div>
    </div>

  </div>
</div>

<script>
  $(document).ready(function() {
    model = new ViewModel();
    ko.applyBindings(model);

  })
</script>