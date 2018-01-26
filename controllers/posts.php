<?php
class Posts extends Controller{
	protected function Index(){
		$viewmodel = new PostModel();
		$this->returnView($viewmodel->Index(), true);
	}

	protected function add(){
		//checks if the user is logged before
		//give him access to the 'add' page.
		if(isset($_SESSION["is_logged_in"])){
			$viewmodel = new PostModel();
			$this->returnView($viewmodel->add(), true);
		} else {
			header("Location: ".ROOT_URL."posts");
		}
	}
} 
?>