<?php

 /**
 * 
 */
class Equipe
{
  function __construct($id,$nom)
  {
    $this->id              = $id;
    $this->nom             = $nom;
  }
// ********** GET  ********************
  function getNom()
  {
    return $this->nom;
  }
  
// ********* SET ******************
  function setNom($nom)
  {
    $this->nom = $nom;
  }
  
// ********* toString ******************
  function __toString()
  {
    return $this->nom;
  }
// ********* dataBase ******************
  
  function createDB($pdo)
  {
     $pdo->beginTransaction();
     $req = $pdo->query("SELECT * FROM Equipes WHERE nom = '$this->nom'");
     $req->execute();
     if($req->fetchAll() != null)
      $pdo->rollback();
    else 
    {       $req = $pdo->query("INSERT INTO Equipes (nom) Values ('$this->nom')
                          ");
      /* $req->execute();*/
       $pdo->commit();
    }
  }

  function majDB()
  {
     /*$pdo->beginTransaction();
     $req = $pdo->prepare("UPDATE Equipes SET :variable = :valeur WHERE id = :id");
     $pdo->commit();*/
  }
}
