<?php

	require_once 'config/config.php';
/*	require_once 'libraries/Core.php';
	require_once 'libraries/Controller.php';
	require_once 'libraries/Database.php';
*/
	// No need to do manual require thngy, get class from libaries and use them
// Autoload the classes.

	spl_autoload_register(function($class_name){
		require_once 'libraries/' . $class_name . '.php' ;
	});
