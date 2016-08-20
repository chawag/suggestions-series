<?php 
class Database
{
	private $host = "******"; 
	private $db_name = "suggestions-series"; 
	private $username = "******"; 
	private $password = "******"; 
	public $conn; 
 
	// get the database connection 
	public function getConnection() { 
		$this->conn = null;

		try {
			$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
		}
		catch (PDOException $exception) {
			echo "Connection error: " . $exception->getMessage();
		}
		 
		return $this->conn;
	}
}