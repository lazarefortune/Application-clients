<?php

namespace App;

class Autoloader{

	static function autoload($class_name){

		if(strpos($class_name, __NAMESPACE__.'\\') == 0)
		{

		// $class_name = str_replace('fortune\\', '', $class_name);
		$class_name = str_replace(__NAMESPACE__ . '\\', '', $class_name);
		$class_name = str_replace('\\', '/', $class_name);



		require __DIR__.'/'.$class_name.'.php';
		}

	}

	static function register()
	{
		spl_autoload_register(array(__CLASS__, 'autoload')); /*idem*/
		// spl_autoload_register(array('Autoloader', 'autoload'));
		
	}
	//
}










?>
