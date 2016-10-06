<?php

//----------------
//DATABASE CONNECTION CLASS
//Controls ability to connect and interact with the database
//----------------

class dbConnection {
	
	//----------------
	//CONSTANTS
	//----------------
	
	private $servername = 'mysql:host=localhost;dbname=wedding_morgan';
	
	private $username = 'root';
	
	private $password = '';
	
	protected static $dbConnection;

	//----------------
	//METHODS
	//----------------

	//* CONSTRUCTOR FUNCTION
	//* Creates a connection to the database when object is instatiated
	//-------------------------------------
	//IS PRIVATE SO OBJECT CONNECTION CANNOT BE CREATED TWICE. USE connect() TO CREATE INSTANCE OF CLASS.
	function __construct() {

	try{
		//CREATE CONNECTION
		self::$dbConnection = new PDO($this->servername,$this->username,$this->password);
		//SETS THE PDO TO ERROR MODE, MEANING IT CAN THROW EXCEPTIONS
		self::$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	//* INSERTINTO FUNCTION
	//* Runs an SQL INSERT INTO query on a $tableName with $values
	//------------------------------------
	function insertInto($tableName, $values){
		//AUTOMATICALLY BREAKS VALUES DOWN INTO COLUMN/VALUE PAIRS FOR INSERTION
		$sql = 'INSERT INTO ' . $tableName . ' (`' . implode('`, `', array_keys($values)) . '`) VALUES ("'. implode($values, '","') .'")';

		try{
			//RUN INSERT QUERY (USES EXEC BECAUSE NO RESULTS RETURNED)
			self::$dbConnection->exec($sql);
			
		}catch(PDOException $e){
			//ECHO MESSAGE DIRECTLY OUT TO SCREEN (TODO: HAVE THE ERROR MESSAGE LOGGED INTO A TABLE)
			echo $sql . "<br />" . $e->getMessage();
			
		}
	}
	
	//* UPDATE FUNCTION
	//* Runs an SQL update quest on a $tableName with $values where id = $id
	//---------------------------
	function update($tableName, $values, $id){
		
		//INITALIZE SET VALUES ARRAY
		$setValues = array();
		
		//SPLIT VALUES ARRAY INTO STRING
		foreach($values as $key => $value){
			$setValues[] = $key . '=' . $value . ',';
		}
		
		//CREATE QUERY
		private $sql = 'UPDATE ' . $tableName . ' SET ' . implode(' ', $setValues) . ' WHERE id = ' . $id;
		
		try{
			//RUN UPDATE QUERY (USES EXEC BECAUSE NO RESULTS RETURNED)
			$dbConnection->exec($sql);
			//RETURN LAST INSERTED ID
			return $dbConnection->lastInsertId();
			
		}catch(PDOException $e){
			//ECHO MESSAGE DIRECTLY OUT TO SCREEN (TODO: HAVE THE ERROR MESSAGE LOGGED INTO A TABLE)
			echo $sql . "<br />" . $e->getMessage();
			
		}
		
	}
	
	//* DIRECTQUERY FUNCTION
	//* Runs a direct SQL query. SQL statement should be whole and complete.
	//------------------------------------
	function directQuery($sql){
		
		try{
			
			//INITALIZE RESULTS
			$results = array();
			//PERPARE QUERY
			$query = self::$dbConnection->prepare($sql);
			//EXECUTE QUERY
			$query->execute();
			//SET FETCH MODE
			$query->setFetchMode(PDO::FETCH_ASSOC);
			//RUN QUERY
			$results = $query->fetchAll();
			//RETURN RESULTS ARRAY
			return $results;
			
		}catch(PDOException $e){
			
			echo $e->getMessage();
			
		}
	}
	
	//* CONNECT FUNCTION
	//* Can be called statically. Creates a dbConnection object with a connection to the database
	//------------------------------------
	public static function connect(){
		//IF NO CONNECTION EXISTS CREATE ONE
		if(!self::$dbConnection){
			self::$dbConnection = new dbConnection();
		}
		//RETURN THE CURRENT OR NEW CONNECTION
		return $dbConnection;
	}

}