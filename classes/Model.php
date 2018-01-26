<?php
//Model class - base model to create other models.
abstract class Model {
	//Class variables.
	protected $dbh; //database handler
	protected $statement;

	//Constructor.
	public function __construct(){
		$this->dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, 
			DB_USER, DB_PASSWORD);
	}//Ends Constructor.

	//Query
	public function query($query){
		$this->statement = $this->dbh->prepare($query);
	}//Ends Query.

	//Binds the preparament statement.
	public function bind($param, $value, $type = null){
		
		if(is_null($type)){
			switch (true) {
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;

				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
							
				default:
					$type = PDO::PARAM_STR;
					break;
			}
		}
		$this->statement->bindValue($param, $value, $type);
	}//Ends bind.

	//Execute method
	public function execute(){
		$this->statement->execute();
	}//Ends Execute.

	//resultSet method
	public function resultSet(){
		$this->execute();
		return $this->statement->fetchAll(PDO::FETCH_ASSOC);
	}

	public function lastInsertId(){
		return $this->dbh->lastInsertId();
	}

	public function single(){
		$this->execute();
		return $this->statement->fetch(PDO::FETCH_ASSOC);
	}
} 
?>