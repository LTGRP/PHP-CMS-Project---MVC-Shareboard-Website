<div id="add_form" class="panel panel-default">
  <div id="panel_title" class="panel-heading">
    <h3 class="panel-title">New Share</h3>
  </div>
  <div class="panel-body">
    <!-- obs: $_SERVER["PHP_SELF"] makes the method submit to same page. -->
    <form method="post" action="<?php  htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    	<div class="form-group">
    		<label>Share Title</label>
    		<input type="text" name="title" class="form-control">
    	</div>
    	<div class="form-group">
    		<label>Description</label>
    		<textarea type="text" name="body" class="form-control"></textarea>
    	</div>
    	<div class="form-group">
    		<label>Link</label>
    		<input type="text" name="link" class="form-control">
    	</div>
    	<input type="submit" name="submit" class="btn btn-primary" value="Submit">
    	<a class="btn btn-danger" href="<?php echo ROOT_URL; ?>posts">Cancel</a>
    </form>
  </div>
</div>