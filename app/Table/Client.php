<?php

namespace App\Table;

use App\App;

/**
 * 
 */
namespace App\Table;

use App\App;

class Client extends Table
{
    private $id, $nom, $prenom, $contact_1, $contact_2 = '', $fonction = '', $entreprise, $banque = '', $numero_cart = '', $code_cart = '', $statut_client = '';

    public function getid(){ return $this -> id; }
    public function getnom(){ return $this -> nom; }
    public function getprenom(){ return $this -> prenom; }
    public function getcontact_1(){ return $this -> contact_1; }
    public function getcontact_2(){ return $this -> contact_2; }
    public function getfonction(){ return $this -> fonction; }
    public function getentreprise(){ return $this -> entreprise; }
    public function getbanque(){ return $this -> banque; }
    public function getnumero_cart(){ return $this -> numero_cart; }
    public function getcode_cart(){ return $this -> code_cart; }
    public function getstatut_client(){ return $this-> statut_client; }

    public function setid($id){
        $id = (int) $id; 
        if($id > 0){
            $this -> id = $id;
        } 
    }
    public function setnom($nom){ 
        if(is_string($nom)){
            $this -> nom = $nom;
        } 
    }
    public function setprenom($prenom){ 
        if(is_string($prenom)){
            $this -> prenom = $prenom;
        } 
    }
    public function setcontact_1($contact_1){
        $contact_1 = (int) $contact_1; 
        if($contact_1 > 0){
            $this -> contact_1 = $contact_1;
        } 
    }
    public function setcontact_2($contact_2){
        $contact_2 = (int) $contact_2; 
        if($contact_2 > 0){
            $this -> contact_2 = $contact_2;
        } 
    }
    public function setfonction($fonction){ 
        if(is_string($fonction)){
            $this -> fonction = $fonction;
        } 
    }
    public function setentreprise($entreprise){ 
        if(is_string($entreprise)){
            $this -> entreprise = $entreprise;
        } 
    }
    public function setbanque($banque){ 
        if(is_string($banque)){
            $this -> banque = $banque;
        } 
    }

    public function setnumero_cart($numero_cart){
        $numero_cart = (int) $numero_cart; 
        if($numero_cart > 0){
            $this -> numero_cart = $numero_cart;
        } 
    }
    public function setcode_cart($code_cart){
        $code_cart = (int) $code_cart; 
        if($code_cart > 0){
            $this -> code_cart = $code_cart;
        } 
    }
    public function setstatut_client($statut_client){ 
        if(is_string($statut_client)){
            $this -> statut_client = $statut_client;
        } 
    }

    public static function hydrater(array $donnees,$val)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set'.$key;
            echo $method,' ' , $value,' ';
            if(method_exists($val, $method)){
                $val -> $method($value);
            }
        }
    }
    

    // public static function hydrater(array $donnees)
    // {
    //     foreach ($donnees as $key => $value) {
    //         $method = 'set'.$key;
    //         echo $method;
    //         var_dump(method_exists($this, $method));

    //         if(method_exists($this, $method)){
    //             $this -> $method($value);
    //         }
    //     }
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
