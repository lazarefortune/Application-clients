<?php

namespace App\Table;

use App\App;

/**
 * 
 */
namespace App\Table;

use App\App;

class Emprunt extends Table
{
    private $id_emprunt, $id_client, $montant, $taux_interet, $date_emprunt = '', $date_echeance = '', $statut_emprunt='';

    public function getid_emprunt(){ return $this -> id_emprunt; }
    public function getid_client(){ return $this -> id_client; }
    public function getmontant(){ return $this -> montant; }
    public function gettaux_interet(){ return $this -> taux_interet; }
    public function getdate_emprunt(){ return $this -> date_emprunt; }
    public function getdate_echeance(){ return $this -> date_echeance; }
    public function getstatut_emprunt(){ return $this -> statut_emprunt; }

    public function setid_emprunt($id){
        $id = (int) $id; 
        if($id > 0){
            $this -> id_emprunt = $id;
        } 
    }
    public function setid_client($id){
        $id = (int) $id; 
        if($id > 0){
            $this -> id_client = $id;
        } 
    }
    public function setmontant($montant){
        $montant = (int) $montant; 
        if($montant > 0){
            $this -> montant = $montant;
        } 
    }
    public function settaux_interet($taux_interet){
        $taux_interet = (int) $taux_interet; 
        if($taux_interet > 0){
            $this -> taux_interet = $taux_interet;
        } 
    }
    public function setdate_emprunt($date_emprunt){
            $this -> date_emprunt = $date_emprunt;
    }
    public function setdate_echeance($date_echeance){
            $this -> date_echeance = $date_echeance;
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
    
    public static function getLast($val){

      // $statement = "SELECT emprunt.id_emprunt, emprunt.id_client, emprunt.montant,emprunt.taux_interet,emprunt.date_emprunt,emprunt.date_echeance,emprunt.statut_emprunt FROM emprunt LEFT JOIN clients ON id_client = clients.id  ORDER BY id";
        $statement = "SELECT * FROM emprunt WHERE id_client =".$val;
        return self::requette($statement,false,true);

    }

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
