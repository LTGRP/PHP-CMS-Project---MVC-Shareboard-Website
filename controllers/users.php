<?php
class Users extends Controller{

	protected function register(){
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->register(), true);
	}

	protected function login(){
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->login(), true);
	}

	protected function logout(){
		//Destroy the specified variables.
		unset($_SESSION["is_logged_in"]);
		unset($_SESSION["user_data"]);

		//Destroys all data registered to the session.
		session_destroy();

		//Redirect the web browser.
		header("Location: ".ROOT_URL);
	}
} 
?>