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

			$checking_email = $this->check_email_at_database($post["email"]);

			//checks if the email input already exists at database.
			//if it doesn't exist the new user will be created.
			if($checking_email){

				echo "We can't register. Email already taken.";
				echo print_r($checking_email);

			} else {
				// Insert into database. 
				$this->query("INSERT INTO users (name, email, password) 
					VALUES (:name, :email, :password)");

				// Doing the data binding.
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

		$password = $post["password"];

		//check for submition
		if($post["submit"]){

			//checks email at database
			//it will be null, or it'll have the hashed password
			//associated with the email input.
			$row = $this->check_email_at_database($post["email"]);

			//verifies if an user was found at database
			//with the input email.
			if($row){
				// Verifies that the password input
				// matches the hash in the database.
				if(password_verify($post["password"], $row)){
					echo "Logged In";
				} else {
					echo "Wrong password";
				}	
			} else {
				echo "User not found";
			}
		}
		return;
	}

	//checks if the email input already exists at database.
	//returns null or the hashed password associated with
	//with the email input.
	private function check_email_at_database($email){
		// Compare credentials. 
		$this->query("SELECT * FROM users 
			WHERE email = :email ");

		// Doing the data binding.
		$this->bind("email", $email);
		
		$result = $this->single();

		return $result["password"];
	}
} 
?>