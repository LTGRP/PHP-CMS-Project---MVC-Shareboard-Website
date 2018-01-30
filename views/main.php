<!doctype html>
<html>
	<head>
		<title>Create a site with MVC Shareboard</title>

		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" type="text/css" href="<?php echo ROOT_URL; ?>assets/css/bootstrap.css">

		<!-- Custom style for this template -->
		<link rel="stylesheet" type="text/css" href="<?php echo ROOT_URL; ?>assets/css/style.css">
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
			<div class="container">
		        <a class="navbar-brand" href="<?php echo ROOT_URL; ?>">MVC Shareboard</a>

	        	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
	        		<span class="navbar-toggler-icon"></span>
		   		 </button>

		        <div id="navbarCollapse" class="collapse navbar-collapse">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="nav-link" href="<?php echo ROOT_URL; ?>">
							Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo ROOT_URL; ?>posts">
							Shares</a>
						</li>
					</ul>
					<ul class="navbar-nav">

					<?php if(isset($_SESSION["is_logged_in"])): ?>
						<li class="nav-item">
							<a class="nav-link text-dark" href="<?php echo ROOT_URL; ?>">
								<?php echo $_SESSION["user_data"]["email"]?></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo ROOT_URL; ?>users/logout">
								Logout</a>
						</li>
					<?php else : ?>	
						<li class="nav-item">
							<a class="nav-link" href="<?php echo ROOT_URL; ?>users/login">
						Login</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo ROOT_URL; ?>users/register">
						Register</a>
						</li>	
					<?php endif; ?>

					</ul>
		        </div><!-- ends .nav-collapse -->
	      	</div><!-- ends container-->
	    </nav><!--ends .navbar navbar-expand-lg navbar-dark bg-dark--> 

    	<div class="container">
	    	<div class="row">
	    		<?php Messages::display(); ?>
	    		<?php require($view); ?>
	    	</div>
    	</div><!-- ends container-->

    	<!-- Javascript links -->
    	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  	</body>
</html>