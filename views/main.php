<!doctype html>
<html>
	<head>
		<title>Blog Site</title>

		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css">

		<!-- Custom style for this template -->
		<link rel="stylesheet" type="text/css" href="./assets/css/style.css">
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
			<div class="container">
		        <a class="navbar-brand" href="<?php echo ROOT_URL; ?>">MVC Shareboard</a>
		        <button class="navbar-toggler" type="button" data-toggle="collapse" 
		        data-target="#navbar" aria-controls="navbar" aria-expanded="false" 
		        aria-label="Toggle navigation">
		        	<span class="navbar-toggler-icon"></span>
	        	</button>

		        <div id="navbar" class="collapse navbar-collapse">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="nav-link" href="<?php echo ROOT_URL; ?>">
							Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo ROOT_URL; ?>posts">
							Posts</a>
						</li>
					</ul>

					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="<?php echo ROOT_URL; ?>users/login">
						Login</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo ROOT_URL; ?>users/register">
						Register</a>
						</li>
					</ul>
		        </div><!--ends .nav-collapse -->
	      	</div><!-- ends container-->
	    </nav><!--ends .navbar navbar-expand-lg navbar-dark bg-dark--> 

    	<div class="container">
	    	<div class="row">
	    		<?php require($view); ?>
	    	</div>
    	</div><!-- ends container-->

  	</body>
</html>