<?php
/**
 * class parente
 */
namespace App\Table;
use App\App;

class Table
{
	protected static $table;

	private static function getTable(){
		if (static::$table === null){

			$class_name = explode('\\', get_called_class());
			static::$table = strtolower(end($class_name).'s');
			
		}
		// die(static::$table);
		return static::$table;
	}
	
	// public static function all(){
	// 	return App::getDB() -> monquery("SELECT * FROM ". static::getTable(),true,get_called_class());

	// }

	public static function all(){
		return App::getDB() -> monquery("SELECT * FROM clients ORDER BY nom,prenom",true,get_called_class());

	}



	public function __get($key){
		$method = 'get'.$key;
		$this->$key = $this-> $method();
		return $this->$key;
	}

	public static function find($id){
		return App::getDB() -> monprepare("SELECT * FROM clients WHERE id= ?",[$id],true,get_called_class(),true);

	}
	public static function findmembre($id){
		return App::getDB() -> monprepare("SELECT * FROM membres WHERE id= ?",[$id],true,get_called_class(),true);

	}


	public static function requette($statement, $attribut = false,$fetch=false, $one = false){
		if($attribut){
			return App::getDB() -> monprepare($statement,$attribut,$fetch,get_called_class() ,$one);
		}else{
			return App::getDB() -> monquery($statement,$fetch,get_called_class(),$one);
		}
	}
    
}