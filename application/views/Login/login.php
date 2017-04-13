<div class="col-xs-12">
	<br><br>
	<div style="text-align: center" >
		<h1>Login to Your Account</h1><br>
		<?php echo validation_errors(); ?>
        <?php echo form_open('verifylogin/index'); ?>

            <div class="field-container" style="margin: 0 auto;">  
		        <input type="text" class="field" required placeholder="Email" name="username"/>
		        <label class="floating-label">Email</label> 
		        <div class="field-underline"></div>
	        </div>
	        <div class="field-container" style="margin: 0 auto; margin-top: 30px">  
		        <input type="password" class="field" required placeholder="Password" name="password"/>
		        <label class="floating-label">Password</label> 
		        <div class="field-underline"></div>
	        </div>
			<br>
			<input type="submit" class="btn btn-primary" name="login" value="Login">
		</form>
		<br>
		<div class="login-help">
			<a href="#">Register</a> - <a href="#">Forgot Password</a>
		</div>
	</div>
</div>
