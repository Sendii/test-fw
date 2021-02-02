<?php

class HomeController extends Controller{
	
	function index($param1){
		return $this->model('User')->index();
	}
}