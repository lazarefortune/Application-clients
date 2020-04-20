<?php
/**
 * 
 */
namespace App\Table;

use App\App;

class ClientManager extends Table
{
	private $_db;

	function __construct($_db)
	{
		$this -> setDb($_db);
	}


	public function setDb($_db){
		$this ->_db = $_db;
	}

	public function add(Client $perso){
		$q = $this->_db -> prepare('INSERT INTO clients(nom,prenom,contact_1,contact_2,fonction,entreprise,banque,numero_cart,code_cart,statut_client) VALUES(:nom,:prenom,:contact_1,:contact_2,:fonction,:entreprise,:banque,:numero_cart,:code_cart,:statut_client)');
		$q -> bindValue(':nom', $perso->getnom());
		$q -> bindValue(':prenom', $perso->getprenom());
		$q -> bindValue(':contact_1', $perso->getcontact_1());
		$q -> bindValue(':contact_2', $perso->getcontact_2());
		$q -> bindValue(':fonction', $perso->getfonction());
		$q -> bindValue(':entreprise', $perso->getentreprise());
		$q -> bindValue(':banque', $perso->getbanque());
		$q -> bindValue(':numero_cart', $perso->getnumero_cart());
		$q -> bindValue(':code_cart', $perso->getcode_cart());
		$q -> bindValue(':statut_client', $perso->getstatut_client());
		$q -> execute();

	}

	public function addEmprunt(Emprunt $emprunt){
		$q = $this->_db -> prepare('INSERT INTO emprunt(id_client,montant,taux_interet,date_emprunt,date_echeance,statut_emprunt) VALUES(:id_client,:montant,:taux_interet,DATE(NOW()),:date_echeance,:statut_emprunt)');
		// $q -> bindValue(':id_emprunt', $perso->getid_emprunt());
		$q -> bindValue(':id_client', $emprunt->getid_client());
		$q -> bindValue(':montant', $emprunt->getmontant());
		$q -> bindValue(':taux_interet', $emprunt->gettaux_interet());
		// $q -> bindValue(':date_emprunt', $perso->getdate_emprunt());
		$q -> bindValue(':date_echeance', $emprunt->getdate_echeance());
		$q -> bindValue(':statut_emprunt', $emprunt->getstatut_emprunt());
		
		$q -> execute();

	}

	public function update(Client $perso){
		$q = $this->_db -> prepare('UPDATE clients SET nom = :nom,prenom = :prenom,contact_1 = :contact_1,contact_2 = :contact_2,fonction = :fonction,entreprise = :entreprise,banque = :banque,numero_cart =  :numero_cart,code_cart = :code_cart,statut_client = :statut_client WHERE id = :id');
		$q -> bindValue(':id', $perso->getid());
		$q -> bindValue(':nom', $perso->getnom());
		$q -> bindValue(':prenom', $perso->getprenom());
		$q -> bindValue(':contact_1', $perso->getcontact_1());
		$q -> bindValue(':contact_2', $perso->getcontact_2());
		$q -> bindValue(':fonction', $perso->getfonction());
		$q -> bindValue(':entreprise', $perso->getentreprise());
		$q -> bindValue(':banque', $perso->getbanque());
		$q -> bindValue(':numero_cart', $perso->getnumero_cart());
		$q -> bindValue(':code_cart', $perso->getcode_cart());
		$q -> bindValue(':statut_client', $perso->getstatut_client());
		$q -> execute();

	}


	public function exists($info)
	  {
	    if (is_int($info)) // On veut voir si tel personnage ayant pour id $info existe.
	    {
	      return (bool) $this->_db->query('SELECT COUNT(*) FROM clients WHERE id = '.$info)->fetchColumn();
	    }
	    
	    // Sinon, c'est qu'on veut vérifier que le nom existe ou pas.
	    
	    $q = $this->_db->prepare('SELECT COUNT(*) FROM clients WHERE nom = :nom');
	    $q->execute([':nom' => $info]);
	    
	    return (bool) $q->fetchColumn();
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













