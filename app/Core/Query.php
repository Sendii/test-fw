<?php

class Query extends Database{
	public $className;
	public $tableName;

	function getNameTable(){
		$this->className = get_called_class();
		$this->tableName = get_called_class();

		require_once '../app/Models/'.$this->className.'.php';
		if(property_exists($this->className, 'table_name')){
			$class = new $this->className;
			$this->tableName = $class->table_name;
		}
		return $this->tableName;
	}

	public function index(){
		$mysqli = new mysqli('localhost', 'root', '', 'test-fw');
		$reply = [];
		if ($mysqli->query('DESCRIBE '.$this->getNameTable())) {
			$result = $mysqli->query('SELECT * FROM '.$this->getNameTable());
			while ($row = $result->fetch_assoc())
				$reply[] = $row;		

			// var_dump($reply);
			return $reply;
		}else{
			echo 'table '.$this->getNameTable(). ' tidak ditemukan';
			exit();
		}		
	}
}