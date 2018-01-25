<?php
class Home extends Controller{
	protected function Index(){
		// echo "home/index";
		$viewmodel = new HomeModel();
		$this->returnView($viewmodel->Index(), true);
	}
} 
?>