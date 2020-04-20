<?php

namespace App;
/**
 *Gerer la connexion à la base de donnée
 */
class App{

  const DB_NAME = 'business';
  const DB_USER = 'root';
  const DB_PASS = '';
  const DB_HOST = 'localhost';

  public static $database;

  private static $siteTitle = 'Mon super site';

  public static function getDB(){
    if(self::$database === null )
    {
      // Connexion à la BDD en instanciant la classe Database
      self::$database = new Database(self::DB_NAME, self::DB_USER,self::DB_PASS,self::DB_HOST);
    }

    return self::$database;
  }
  // function __construct(argument)
  // {
  //   // code...
  // }

  public static function notFound(){
    header("HTTP/1.0 404 Not Found");
    header("Location: index.php?p=404");
  }

  public static function getSiteTitle(){
    return self::$siteTitle;
  }

  public static function setSiteTitle($title){
    self::$siteTitle = $title;
  }









}








 ?>
