<?php
	class Database{
		private $connection;

		public function __construct(){
			$this->connection=new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
			if(!$this->connection)
				die('Database error '.mysqli_error());
		}

		public function query($sql){
			$query=mysqli_query($this->connection,$sql);
			if(!$query)
				return mysqli_error($this->connection);
			else
				return $query;
		}
		public function fetch_assoc($sql){
			return mysqli_fetch_assoc($sql);
		}
		public function escape_string($sql){
			return mysqli_escape_string($this->connection,$sql);
		}
		public function insert_id(){
			return mysqli_insert_id($this->connection);
		}
	}

	$database=new Database();
?>