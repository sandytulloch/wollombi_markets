<div class="col-xs-12">
	<br><br>
	<div class="col-xs-12">
		<div class="panel panel-default">	
			<div class="panel-body" >
				<h1>Login to Your Account</h1><br>
				<?php echo validation_errors(); ?>
	            <?php echo form_open('verifylogin/index'); ?>
		            <label>Email</label>
					<input type="text" class="form-control" name="username" placeholder="Username">
					<label>Password</label>
					<input type="password" class="form-control" name="password" placeholder="Password">
					<br>
					<input type="submit" class="btn btn-primary" name="login" value="Login">
				</form>
				<br>
				<div class="login-help">
					<a href="#">Register</a> - <a href="#">Forgot Password</a>
				</div>
			</div>
		</div>
	</div>
</div>
