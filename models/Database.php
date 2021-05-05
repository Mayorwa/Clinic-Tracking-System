<?php

class Database{
	
	private $host;
	private $username;
	private $password;
	private $dbname;

	private $dbh;
	private $error;
	private $stmt;
	public function __construct($host='localhost', $dbname='cts', $username='root', $password=''){
		$this->host = $host;
		$this->username = $username;
		$this->dbname = $dbname;
		$this->password= $password;

		// Set DSN
		$dsn = 'mysql:host='. $this->host . ';dbname='. $this->dbname;

		// Set Options
		$options = array(
			PDO::ATTR_PERSISTENT		=> true,
			PDO::ATTR_ERRMODE		=> PDO::ERRMODE_EXCEPTION
		);

		// Create new PDO
		try {
			$this->dbh = new PDO($dsn, $this->username, $this->password, $options);
		} catch(PDOException $e){
			$this->error = $e->getMessage();
		}
	}

	public function query($query){
		$this->stmt = $this->dbh->prepare($query);
	}

	public function bind($param, $value, $type = null){
		if(is_null($type)){
			switch(true){
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
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}

	public function execute(){
		return $this->stmt->execute();
	}

	public function fetchAll(){
		$this->execute();
		$result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	public function fetch(){
	    $this->execute();
	    $result = $this->stmt->fetch();
        return $result;
    }
}