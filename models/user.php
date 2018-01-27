<?php
class UserModel extends Model{
	
	//function to register a new user at database.
	public function register(){
		//sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


		//encrypting password by hashing it.
		$password = password_hash($post["password"], PASSWORD_DEFAULT);


		//check for submition
		if($post["submit"]){

			//Checks if all fields in the form were filled.
			//if something is empty, the form won't submit.
			if( empty($post["name"]) || 
				empty($post["email"])|| 
				empty($post["password"])){

				//defines the message of 'error' type.
				Messages::setMsg("Please fill all the fields in the form.", "error");

				return;
			}//ends checking for form fields.

			//variable to hold the email input.
			$checking_email = $this->check_email_at_database($post["email"]);

			//checks if the email input already exists at database.
			//if it doesn't exist the new user will be created.
			if($checking_email){

				//defines the message of 'error' type.
				Messages::setMsg("We can't register. Email already taken.", "error");

			} else {
				// Insert into database. 
				$this->query("INSERT INTO users (name, email, password) 
					VALUES (:name, :email, :password)");

				// Doing the data binding.
				// Observation: the hashed password is used
				// and NOT the password that was input.
				$this->bind("name", $post["name"]);
				$this->bind("email", $post["email"]);
				$this->bind("password", $password);
				$this->execute();

				//Verify
				if($this->lastInsertId()){
					// redirect
					header("Location: ".ROOT_URL."users/login");

				}
			}//ends checking email at database.
		}//ends checking for submition
		return;
	}

	//function to login an existent user at database.
	public function login(){
		//sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		//check for submition
		if($post["submit"]){

			//Checks if all fields in the form were filled.
			//if something is empty, the form won't submit.
			if(empty($post["email"]) || empty($post["password"])){

				//defines the message of 'error' type.
				Messages::setMsg("Please fill all the fields in the form.", "error");

				return;
			}//ends checking for form fields.

			//checks email at database
			//it will be null, or it'll have an array with 
			//user data.
			$row = $this->check_email_at_database($post["email"]);

			//verifies if an user was found at database
			//with the input email.
			if($row){
				// Verifies that the password input
				// matches the hash in the database.
				if(password_verify($post["password"], $row["password"])){

					//Create Session variables.
					$_SESSION["is_logged_in"] = true;
					$_SESSION["user_data"] = array (
						"id" 	=> $row["id"],
						"name" 	=> $row["name"],
						"email" => $row["email"]
					);

					//Redirect web browser.
					header('Location: '.ROOT_URL.'posts');	

				} else {

					//defines the message of 'error' type.
					Messages::setMsg("The password is incorrect", "error");
				}
			} else {

				//defines the message of 'error' type.
				Messages::setMsg("User does not exist in the database", "error");
			}
		}
		return;
	}

	//checks if the email input already exists at database.
	//returns null or an array with user data.
	private function check_email_at_database($email){
		// Compare credentials. 
		$this->query("SELECT * FROM users 
			WHERE email = :email ");

		// Doing the data binding.
		$this->bind("email", $email);
		
		$result = $this->single();

		return $result;
	}
} 
?>