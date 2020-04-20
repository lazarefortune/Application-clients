<?php
// use \PDO;


namespace App;

class Database{
    private $pdo;

    private $db_name;
    private $db_host;
    private $db_user;
    private $db_pass;


    public function __construct($db_name, $db_user ='root', $db_pass='' ,$db_host= 'localhost')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    private function getPDO(){
        //boucle if pour empecher trop de connexion à la base de donnée
        if($this -> pdo === null){
            $pdo = new \PDO('mysql:dbname='.($this -> db_name).';host='.($this -> db_host), $this -> db_user,$this -> db_pass);
            $pdo -> setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); //pour avoir les erreurs
            $this -> pdo = $pdo;
        }

        return $this -> pdo;
    }

    public function monquery($statement,$fetch = false,$class_name,$one= false){
        $req = ($this -> getPDO()) -> query($statement);
        // $datas = $req -> fetchAll(\PDO::FETCH_OBJ);
        // $datas = $req -> fetchAll(\PDO::FETCH_CLASS, $class_name);
        if($fetch){
            $req -> setFetchMode(\PDO::FETCH_CLASS, $class_name);
            if($one){
                $datas = $req->fetch();
            }else{
                $datas = $req->fetchAll();
            }

            return $datas;
        }else{
            $req->execute();
        }
    }

    public function monprepare($statement, $attribut,$fetch = false, $class_name, $one = false){
        $req = ($this -> getPDO()) -> prepare($statement);
        // $datas = $req -> fetchAll(\PDO::FETCH_OBJ);
        $req -> execute($attribut);
        // si on a besoin de faire un fetch
        if($fetch){
            $req -> setFetchMode(\PDO::FETCH_CLASS, $class_name);
            if($one){
                $datas = $req -> fetch();
            }
            else
            {
                $datas = $req -> fetchAll();
            }

            return $datas;
        }
    }

    // public function monprepareInsert($statement, $attribut){
    //     $req = ($this -> getPDO()) -> prepare($statement);
    //     // $datas = $req -> fetchAll(\PDO::FETCH_OBJ);
    //     $req -> execute($attribut);
    //     return "ok";
    // }



}









?>
