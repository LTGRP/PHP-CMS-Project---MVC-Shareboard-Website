<?php
class PostModel extends Model{
	
	public function Index(){
		
		$this->query("SELECT * FROM posts ORDER BY create_date DESC");
		$rows = $this->resultSet();
		return $rows;
	}

	//function to add a new Share at Database.
	public function add(){
		//sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		//check for submition
		if($post["submit"]){

			//Checks if all fields in the form were filled.
			//if something is empty, the form won't submit.
			if( empty($post["title"])	||
				empty($post["body"])	|| 
				empty($post["link"])) {

				//defines the message of 'error' type.
				Messages::setMsg("Please fill all the fields in the form", "error");

				return;
			}//ends checking for form fields.

			// Insert into database. 
			$this->query("INSERT INTO posts (title, body, link, user_id) 
				VALUES (:title, :body, :link, :user_id)");

			// Doing the data binding.
			$this->bind("title", $post["title"]);
			$this->bind("body", $post["body"]);
			$this->bind("link", $post["link"]);
			$this->bind("user_id", $_SESSION["user_data"]["id"]);
			$this->execute();

			//Verify
			if($this->lastInsertId()){
				// redirect
				header("Location: ".ROOT_URL."posts");

			}
		}
		return;
	}//ends the add function.
} 
?>