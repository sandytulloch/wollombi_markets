<div class="col-xs-12">
	<br><br>
	<div class="col-xs-4"></div>
	<div class="col-xs-4">
		<div class="panel panel-default">	
			<div class="panel-body" style="text-align: center" >
				<h1>Login to Your Account</h1><br>
				<?php echo validation_errors(); ?>
	            <?php echo form_open('verifylogin/index'); ?>
					<input type="text" class="form-control" name="username" placeholder="Username">
					<input type="password" class="form-control" name="password" placeholder="Password">
					<input type="submit" class="btn btn-primary" name="login" value="Login">
				</form>

				<div class="login-help">
					<a href="#">Register</a> - <a href="#">Forgot Password</a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-4"></div>
</div>
