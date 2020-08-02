<?php require_once	'controllers/authcontroller.php'; ?>
<!DOCTYPE html>
<html lang="en">

<body>
	
</body>
</html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <!-- BootStrap 4  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Login</title>

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 offset-md-4">
				<form action="Login.php" method="post">
					<h3 class="text-center">Login</h3>

					<?php if(count($errors) > 0): ?>
						<div class="alert alert-danger">
							<?php foreach($errors as $error ): ?>
								<li><?php echo $error;?></li>
							<?php endforeach;?>
						</div>
					<?php endif;?>
					
					<div class="form-group">
						<label for="username">Username/Email</label>
						<input type="text" name="username" class="form-control form-control-lg">
					</div>
					
					<div class="form-group">
						<label for="password">Password</label>
						<input type="text" name="password" class="form-control form-control-lg">
					</div>										

					<div class="form-group">
						<button type="submit" name="Login-btn" class="btn btn-primary btn-block btn-lg">Sign In</button>
					</div>	
					<p class="text-center ">Not a Member? <a href="Signup.php">Sign Up</a></P>
				
				</form>
			
			</div>
		
		</div>
	
	</div>

</body>



</html>