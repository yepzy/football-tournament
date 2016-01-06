<?php
/**
* 
*/
class Groupe
{
	private $id;
	private $listeEquipes;

	function __construct($id,$pdo)
	{
		$this->id = $id;
		$this->listeEquipes = array();

		$pdo->query("CREATE TABLE Groupe_'$this->id' (idEq INT,nom VARCHAR(20),points INT,matchGagner INT,matchNulAvecBut INT, matchNulSansBut INT, matchPerdu INT,butMis INT,butPris INT,diff INT)")

	}

	function ajouterEquipe($eq)
	{
							  //[ idEq 	     => [nom,pts,matchGagner,matchNulAvecBut,matchNulSansBut,matchPerdu,butMis,butPris,Diff] ]
		$this->listeEquipes[] = $eq->getId() => {$eq->getNom(),0	 ,0			 ,0				 ,0				 ,0		    ,0	   ,0	   ,0	} }
	}

	function getListeEquipe()
	{
		return $this->listeEquipes;
	}

	function addDB($pdo)
	{
		$pdo->beginTransaction();
		$req = $pdo->query("SELECT * FROM Groupe_'$this->id'");
     	$req->execute();      
    	$req = $pdo->query("INSERT INTO Groupe_'$this->id' Values ('$this->nom','$this->points')");
		$pdo->commit();
	}

	public function __toString()
	{
		
	}
}