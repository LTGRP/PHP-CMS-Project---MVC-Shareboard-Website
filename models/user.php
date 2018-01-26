<?php
class UserModel extends Model{
	public function register(){
		//sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		//encrypting password by hashing it.
		$password = password_hash($post["password"], PASSWORD_DEFAULT);

		//check for submition
		if($post["submit"]){
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
		}
		return;
	}
} 
?>