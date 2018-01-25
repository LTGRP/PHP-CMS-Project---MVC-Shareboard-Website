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
	}//Ends __constructor.

	//Method to create a controller.
	function createController(){
		// Check if class exists.
		if(class_exists($this->controller)){
			//returns an array with the name of the parent classes 
			//of the given class.
			$parents = class_parents($this->controller);

			//Check Extend
			if(in_array("Controller", $parents)){
				if(method_exists($this->controller, $this->action)){
					return new $this->controller($this->action, $this->request);
				} else {
					// method does not exist
					echo "<h2>This method does not exist.</h2>";
					return;
				}
			} else {
				// base controller does not exist
				echo "<h2>Base controller does not exist.</h2>";
				return;
			}
		} else {
			// controller class does not exist
			echo "<h2>Controller class does not exist.</h2>";
			return;
		}
	}//Ends createController.

}//Ends Bootstrap class. 
?>