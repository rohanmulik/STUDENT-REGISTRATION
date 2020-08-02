<?php require_once	'controllers/authcontroller.php'; ?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <!-- BootStrap 4  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Homepage</title>

</head>

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 offset-md-4 form-div login">
                <?php if(isset($_SESSION['message'])): ?>
                    <div class="alert <?php echo $_SESSION["alert-class"];?>">
                        <?php 
                          echo $_SESSION['message']; 
                          unset($_SESSION['message']);
                          unset($_SESSION['alert-class']);
                        ?>
                    </div>  
                <?php endif; ?>

                </div>
                <h3>Welcome, <?php echo $_SESSION["username"]; ?></h3>
                <a href="#">Log Out</a>
                <?php if(!$_SESSION["verified"]): ?>
                    <div class="alert alert-warning">
                        Verify account.
                        Verification Link Sent at <strong><?php echo $_SESSION["emailid"]; ?></strong>. Click on it to confirm.
                    </div>
                <?php endif;?>

                <?php if($_SESSION["verified"]): ?>
                    <button class="btn btn-block btn-lg btn-primary"> I am Verified! </button>
                <?php endif;?>
                
			</div>
		
		</div>
	
	</div>

</body>



</html>