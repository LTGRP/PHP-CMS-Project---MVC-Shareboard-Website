<?php
class Posts extends Controller{
	protected function Index(){
		$viewmodel = new PostModel();
		$this->returnView($viewmodel->Index(), true);
	}

	protected function add(){
		$viewmodel = new PostModel();
		$this->returnView($viewmodel->add(), true);
	}
} 
?>