<?php

class Database{	
	private static $_instance = null;
	public $mysqli;

	public function __construct(){
		$connect   = require_once '../config/app.php';
		$hostname  = ( !empty($connect['database']['mysql']['hostname']) ?
			$connect['database']['mysql']['hostname'] :
			'localhost' );
		$username  = ( !empty($connect['database']['mysql']['username']) ?
			$connect['database']['mysql']['username'] :
			'root' );
		$password  = ( !empty($connect['database']['mysql']['password']) ?
			$connect['database']['mysql']['password'] :
			'' );
		$database  = ( !empty($connect['database']['mysql']['database']) ?
			$connect['database']['mysql']['database'] :
			'my_database' );

		$this->mysqli = new mysqli($hostname, $username, $password, $database);

		if ($this->mysqli->connect_errno) {
			echo "Failed to connect to MySQL: " . $this->mysqli->connect_error;
			exit();
		}
	}

	public static function getInstance(){
		if (!isset(self::$_instance)) {
			self::$_instance = new Database();
		}
		return self::$_instance;
	}

	
}