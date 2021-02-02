<?php

class Controller{
	
	public function view($file, $data = []){
		if (file_exists('../views/'.$file.'.php')) {
			require_once '../views/'.$file.'.php';
		}else{
			echo "file ".$file." tidak ditemukan";
		}
	}

	public function model($file){
		require_once '../app/Models/'.$file.'.php';

		// dimodel kita mengembalikan sebuah object
		return new $file;
	}
}

?>