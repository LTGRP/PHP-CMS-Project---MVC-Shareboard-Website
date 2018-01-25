<?php
class Bootstrap {
	//Class variables.
	private $controller;
	private $action;
	private $request;

	//Constructor.
	public function __construct($request){
		$this->request = $request;
		
		if ($this->request["controller"] === "") {
			$this->controller = "home";
		}else{
			$this->controller = $this->request["controller"];
		}

		if ($this->request["action"] === "") {
			$this->action = "index";
		} else {
			$this->action = $this->request["action"];
		}
	}//Ends Constructor.

}//Ends Bootstrap class. 
?>