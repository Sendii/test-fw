<?php

class Route{
	protected $controller 	   = 'HomeController';
	protected $objController   = '';
	protected $method	       = 'index';
	protected $params	       = [];
	protected $currUrl	       = '';
	protected $root_controller = 'app/Http/Controller/';

	public function __construct(){
		$this->currUrl = explode('/', filter_var( trim( $_SERVER['REQUEST_URI'] ), FILTER_SANITIZE_URL ));	
		return $this->getControllerName();	
	}

	function getControllerName(){
		if (empty($this->currUrl[3])) {
			$this->controller = 'HomeController';
		}else{
			$this->controller = $this->currUrl[3].'Controller';
		}
		return $this->checkControllerFile($this->currUrl[3]);	
	}

	function checkControllerFile($function='index'){		
		if(file_exists('../'.$this->root_controller.ucwords($this->controller).'.php')){
			if (!empty($this->currUrl[4])) {			
				$this->method = $this->currUrl[4];
			}
			return $this->checkControllerFunction();
		}else{
			echo 'file  '.$this->root_controller.$this->controller.'.php tidak ditemukan';
		}
	}

	function index(){
		echo "ea";
	}

	function checkControllerFunction(){
		$this->makeObject();
		if (method_exists($this->controller, $this->method)) {
			// call_user_func([$this->controller, $this->method]);
			// $this->params = ['satus', 'dua'];
			$this->getParams();
			try {
				call_user_func_array([$this->controller, $this->method], $this->params);
			} catch (ArgumentCountError $e) {
				echo $e->getMessage();
			}
		}else{
			echo 'method '.$this->method.' tidak ditemukan';
		}
	}

	function getParams(){
		foreach ($this->currUrl as $key => $value) {
			if ($key > 4 && !empty($value)) {
				array_push($this->params, $value);
			}
		}
	}

	function makeObject(){
		require_once '../'.$this->root_controller.$this->controller.'.php';
		$this->controller = new $this->controller;
	}
}