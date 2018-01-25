<?php
class Posts extends Controller{
	protected function Index(){
		// echo "posts/index";
		$viewmodel = new PostModel();
		$this->returnView($viewmodel->Index(), true);
	}
} 
?>