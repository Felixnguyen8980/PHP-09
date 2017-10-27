<?php
	class connectDB {
		public $servername = 'localhost';
		public $username = 'root';
		public $password = '';
		public $database = 'shop';
		public $conn;
		public function connect(){
			$this->conn = new mysqli($this->servername,$this->username,$this->password,$this->database);			
			return $this->conn;
		
		}
		public function __construct(){
			$this->connect();
		}
	}

?>