<div id="input_form" class="panel panel-default">

  <div id="panel_title" class="panel-heading">
    <h3 class="panel-title">User Login</h3>
  </div><!-- ends panel-heading -->
  
  <div class="panel-body">
    <!-- obs: $_SERVER["PHP_SELF"] makes the method submit to same page. -->
    <form method="post" action="<?php  htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    	<div class="form-group">
    		<label>Email</label>
    		<input type="text" name="email" class="form-control"
            autocomplete="new-password"></input>
    	</div>
    	<div class="form-group">
    		<label>Password</label>
    		<input type="password" name="password" class="form-control" 
            autocomplete="new-password">
    	</div>
    	<input type="submit" name="submit" class="btn btn-primary" value="Submit">
    </form>
  </div><!-- ends panel-body -->
</div>