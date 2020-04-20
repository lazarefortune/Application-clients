<?php

namespace App\Table;

use App\App;

/**
 * 
 */
namespace App\Table;

use App\App;

class Membre extends Table
{
    private $id, $identifiant, $mail, $mdp, $statut= 'client';

    public function getid(){ return $this -> id; }
    public function getidentifiant(){ return $this -> identifiant; }
    public function getmail(){ return $this -> mail; }
    public function getmdp(){ return $this -> mdp; }
    public function getstatut(){ return $this -> statut; }
    

    public function setid($id){
        $id = (int) $id; 
        if($id > 0){
            $this -> id = $id;
        } 
    }
    public function setidentifiant($identifiant){ 
        if(is_string($identifiant)){
            $this -> identifiant = $identifiant;
        } 
    }
    // public function setmail($mail){ 
    //     if(is_string($mail)){
    //         $this -> mail = $mail;
    //     } 
    // }
    public function setmdp($mdp){
            $this -> mdp = $mdp; 
    }
    // public function setstatut($statut){ 
    //     if(is_string($statut)){
    //         $this -> statut = $statut;
    //     } 
    // }

    


    public function hydrater($donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set'.ucfirst($key);

            if(method_exists($this, $method)){
                $this -> $method($value);
            }
        }
    }

    // public function __construct(array $donnees)
    // {
    //     $this -> hydrater($donnees);

    // }

    // public static function getLast(){

    //   $statement = "SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie FROM articles LEFT JOIN categories ON categorie_id = categories.id  ORDER BY id";
    //     return self::requette($statement,false,true);

    // }

    // public function getURL(){
    //     return 'index.php?p=article&id='.$this -> id;
    // }

    // public function getExtrait(){
    // 	$html = '<p>'.substr($this -> contenu,0, 150).' ...</p>';
    // 	$html .= '<p><a href="'.$this->getURL().'"> <button class="btn btn-primary">Lire la suite</button> </a></p>';

    //     return $html;

    // }

    // public static function lastByCategorie($id){
    //     $statement = "SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie FROM articles LEFT JOIN categories ON categorie_id = categories.id WHERE categorie_id=? ORDER BY articles.id";
    //     // return self::requette($statement,[$id]);

    //     // $statement = "SELECT * FROM articles WHERE categorie_id=?";
    //     return self::requette($statement,[$id],true);

    // }


}
