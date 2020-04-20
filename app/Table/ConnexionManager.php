<?php
/**
 * 
 */
namespace App\Table;

use App\App;

class ConnexionManager extends Table
{
	private $_db,$info = '';

	function __construct($_db)
	{
		$this -> setDb($_db);
	}


	public function setDb($_db){
		$this ->_db = $_db;
	}

	public function add(Client $membre){
		$q = $this->_db -> prepare('INSERT INTO membres(identifiant,mail,mdp,statut) VALUES(:identifiant,:mail,:mdp,:statut)');
		$q -> bindValue(':identifiant', $perso->getidentifiant());
		$q -> bindValue(':mail', $perso->getpremail());
		$q -> bindValue(':mdp', $perso->getmdp());
		$q -> bindValue(':statut', $perso->getstatut());
		
		$q -> execute();

	}


	public function exists($info)
	  {
	  	$this-> info = $info;
	  	// On veut voir si tel personnage ayant pour id $info existe.
	    // if (is_int($info)) 
	    // {
	    //   return (bool) $this->_db->query('SELECT COUNT(*) FROM membres WHERE id = '.$info)->fetchColumn();
	    // }
	    
	    // Sinon, c'est qu'on veut vérifier que le nom existe ou pas.
	    
	    $q = $this->_db->prepare('SELECT COUNT(*) FROM membres WHERE identifiant = :identifiant OR mail = :mail');
	    $q->execute([':identifiant' => $info, ':mail' => $info]);
	    
	    return (bool) $q->fetchColumn();
	  }

	

	public function recup_membre($val){
		$info = $this-> info;
		$q = $this->_db->prepare('SELECT * FROM membres WHERE identifiant = :identifiant OR mail = :mail');
	    $q->execute([':identifiant' => $info,':mail' => $info]);
	    $membre = $q -> fetch();
	    return $membre[$val];
	}

	public function connexion($info,$mdpconnect){
		if($this-> exists($info)){
			$mdp = $this-> recup_membre('mdp');
			if(password_verify($mdpconnect, $mdp)== 1){
				return 'connecte';
			}
			else
			{
				return 'erreur1';
			}
		
		}
		else
		{
			return 'erreur2';
		}
	}
	  //tableau des personnages différent de $nom
	 // public function getList($nom = null)
	 //  {
	 //    $persos = [];
	 //    if($nom <> null){
		//     $q = $this->_db->prepare('SELECT id, nom, prenom FROM clients WHERE nom <> :nom ORDER BY nom');
		//     $q->execute([':nom' => $nom]);
		// }else
		// {
		// 	$q = $this->_db->query('SELECT id, nom, degats FROM personnages ORDER BY nom');
		//     $q->execute();
		// }
	    
	 //    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
	 //    {
	 //      $persos[] = new Personnage($donnees);
	 //    }
	    
	 //    return $persos;
	 //  }

	
}













