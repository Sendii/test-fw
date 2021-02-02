<?php

class Model extends Query{
	private $_db;
	function __construct(){
		$this->_db = Database::getInstance();
	}
}