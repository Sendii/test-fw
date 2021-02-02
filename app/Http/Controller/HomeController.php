<?php

class HomeController extends Controller{
	
	function index($param1){
		$users = $this->model('User')->index();
		return $this->view('user');
	}
}