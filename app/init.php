<?php

// meload otomatis tanpa meload satu satu class
spl_autoload_register(function($class){
	require_once 'Core/'.$class.'.php';
});