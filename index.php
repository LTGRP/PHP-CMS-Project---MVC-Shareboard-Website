<?php
//Start Session
session_start();

//Include necessary php files.
require("config.php");

require("classes/Bootstrap.php");
require("classes/Controller.php");
require("classes/Model.php");

require("controllers/home.php");
require("controllers/posts.php");
require("controllers/users.php");

require("models/home.php");
require("models/post.php");
require("models/user.php");

//Create an instance of the Bootstrap class.
$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();

if($controller){
	$controller->executeAction();
}
?>