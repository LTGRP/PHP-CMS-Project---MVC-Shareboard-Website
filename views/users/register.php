<div id="add_form" class="panel panel-default">
  <div id="panel_title" class="panel-heading">
    <h3 class="panel-title">Create User</h3>
  </div>
  <div class="panel-body">
    <!-- obs: $_SERVER["PHP_SELF"] makes the method submit to same page. -->
    <form method="post" action="<?php  htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    	<div class="form-group">
    		<label>Name</label>
    		<input type="text" name="name" class="form-control">
    	</div>
    	<div class="form-group">
    		<label>Email</label>
    		<input type="text" name="email" class="form-control"></textarea>
    	</div>
    	<div class="form-group">
    		<label>Password</label>
    		<input type="password" name="password" class="form-control">
    	</div>
    	<input type="submit" name="submit" class="btn btn-primary" value="Submit">
    </form>
  </div>
</div>