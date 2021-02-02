<?php

class Database{
	protected $mysqli;
	protected $hostname  = 'localhost';
	protected $username  = 'root';
	protected $password  = '';
	protected $database  = 'test-fw';

	public function __construct(){
		$this->mysqli = new mysqli($this->hostname, $this->username, $this->password, $this->database);

		if ($this->mysqli->connect_errno) {
			echo "Failed to connect to MySQL: " . $this->mysqli->connect_error;
		}
	}
}