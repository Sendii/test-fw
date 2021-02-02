<?php

class Query extends Database{

	public function index(){
		$mysqli = new mysqli('localhost', 'root', '', 'test-fw');
		$reply = [];
		$result = $mysqli->query('SELECT * FROM '.get_called_class());

		while ($row = $result->fetch_assoc())
			$reply[] = $row;
		var_dump($reply);
	}
}