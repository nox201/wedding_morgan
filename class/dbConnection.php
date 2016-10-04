<?php

//TABLE WILL BE CALLED wedding_morgan
//WILL HAVE AUTO-INCREMENT ID (UNSIGNED INT), NAME (VARCHAR(50)), ATTENDING (BOOL('true','false')), FOODCHOICE (ENUM ('OPTION1','OPTION2'), MESSAGE (VARCHAR (250)), CREATED (DATETIME)
//fascjkfsdjkfsdjkl;
//----------------
//DATABASE CONNECTION CLASS
//Controls ability to connect and interact with the database
//----------------

class dbConnection {
	
	//----------------
	//CONSTANTS
	//----------------
	
	private $servername = '';
	
	private $dbname = '';
	
	private $username = '';
	
	private $password = '';

	//----------------
	//METHODS
	//----------------

	//* CONSTRUCTOR FUNCTION
	//* Creates a connection to the database when object is instatiated
	//-------------------------------------
	//IS PRIVATE SO OBJECT CONNECTION CANNOT BE CREATED TWICE. USE connect() TO CREATE INSTANCE OF CLASS.
	private function __construct{
		
	try{
		//SERVERNAME WILL BE LOCALHOST?
		$dbConnection = new PDO("$servername;$dbname",$username,$password);
		//SETS THE PDO TO ERROR MODE, MEANING IT CAN THROW EXCEPTIONS
		self::$dbConnection->setAttribute(PDO::ATTR_ERRRMODE, PDO::ERRMODE_EXCPETION);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	//* INSERTINTO FUNCTION
	//* Runs an SQL INSERT INTO query on a $tableName with $values
	//------------------------------------
	function insertInto($tableName, $values){
		//AUTOMATICALLY BREAKS VALUES DOWN INTO COLUMN/VALUE PAIRS FOR INSERTION
		private $sql = 'INSERT INTO ' . $tableName . ' ("' . implode('", "', array_keys($values)) . '") VALUES ("'. implode($values, '","') .'")';
		
		try{
			//RUN INSERT QUERY (USES EXEC BECAUSE NO RESULTS RETURNED)
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
			$query = $dbConnection->prepare($sql);
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
			new dbConnection();
		}
		//RETURN THE CURRENT OR NEW CONNECTION
		return $dbconnection;
	}

}