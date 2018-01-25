<?php
//Controller class - base controller to create other controllers.
abstract class Controller{
	//Class variables. 
	protected $request;
	protected $action;

	//Constructor method.
	public function __construct($action, $request){
		$this->action = $action;
		$this->request = $request;
	}//Ends constructor.

	public function executeAction(){
		return $this->{$this->action}();
	}//Ends executeAction.

	protected function returnView($viewmodel, $fullview){
		$view = "views/".get_class($this)."/".$this->action.".php";

		if($fullview){
			require("views/main.php");
		} else {
			require("view");
		}
	}//Ends returnView.
}//Ends Controller class.
?>