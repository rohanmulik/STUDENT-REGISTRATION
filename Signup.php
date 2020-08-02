<?php require_once	'controllers/authcontroller.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	
</body>
</html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <!-- BootStrap 4  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Register</title>

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 offset-md-4">
				<form action="signup.php" method="post">
					<h3 class="text-center">Register</h3>

					<?php if(count($errors) > 0): ?>
						<div class="alert alert-danger">
							<?php foreach($errors as $error ): ?>
								<li><?php echo $error;?></li>
							<?php endforeach;?>
						</div>
					<?php endif;?>
					
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" name="username" value="<?php echo $username; ?>" class="form-control form-control-lg">
					</div>
					
					<div class="form-group">
						<label for="emailid">Email-ID</label>
						<input type="text" name="emailid" value="<?php echo $emailid; ?>" class="form-control form-control-lg">
					</div>

					<div class="form-group">
						<label for="password">Password</label>
						<input type="text" name="password" class="form-control form-control-lg">
					</div>										

					<div class="form-group">
						<label for="confirmpassword">Confirm Password</label>
						<input type="text" name="confirmpassword" class="form-control form-control-lg">
					</div>	

					<div class="form-group">
						<button type="submit" name="signup-btn" class="btn btn-primary btn-block btn-lg">Sign Up</button>
					</div>	
					<p class="text-center ">Already a Member? <a href="login.php">Sign In</a></P> 
				
				</form>
			
			</div>
		
		</div>
	
	</div>

</body>



</html>