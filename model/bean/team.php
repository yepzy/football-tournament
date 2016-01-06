<?php

 /**
 * 
 */
class Team
{
  private $state;
  private $group;
  private $idTeam;
  private $point;
  private $played;
  private $won;
  private $tieWithGoal;
  private $tieWithoutGoal;
  private $lost;
  private $goalFor;
  private $goalAgainst;
  private $goalDifference;

  public function __construct__($state,$group,$idTeam,$point,$played,$won,$tieWithGoal,$tieNoGoal,$lost,$goalFor,$goalAgainst,$goalDifference)
  {
    $this->idTeam       = $idTeam;
    $this->point        = $point;
    $this->played       = $played;
    $this->won          = $won;
    $this->tieWithGoal  = $tieWithGoal;
    $this->tieNoGoal    = $tieWithoutGoal;
    $this->lost         = $lost;
    $this->goalFor      = $goalFor;
    $this->goalAgainst  = $goalAgainst;
    $this->goalDifference   = $goalDifference;
  }
// ********** GET  ********************
  public function getidTeam()
  {
    return $this->idTeam;
  }

  public function getPoint()
  {
    return $this->point;
  }

  public function getPlayed()
  {
    return $this->played;
  }

  public function getWon()
  {
    return $this->won;
  }

  public function getTieWithGoal()
  {
    return $this->tieWithGoal;
  }

  public function getTieWithoutGoal()
  {
    return $this->tieWithoutGoal;
  }

  public function getLost()
  {
    return $this->lost;
  }

  public function getGoalFor()
  {
    return $this->goalFor;
  }

  public function getGoalAgainst()
  {
    return $this->goalAgainst;
  }

  public function getGoalDifference()
  {
    return $this->goalDifference;
  }
  
// ********* SET ******************
  public function setidTeam($idTeam)
  {
    $this->idTeam = $idTeam;
  }

  public function setPoint($point)
  {
    $this->point = $point;
  }

  public function setPlayed($played)
  {
    $this->played = $played;
  }

  public function setWon($won)
  {
    $this->won = $won;
  }

  public function setTieWithGoal($tieWithGoal)
  {
    $this->tieWithGoal = $tieWithGoal;
  }

  public function setTieWithoutGoal($tieWithoutGoal)
  {
    $this->tieWithoutGoal = $tieWithoutGoal;
  }

  public function setLost($lost)
  {
    $this->lost = $lost;
  }

  public function setGoalFor($goalFor)
  {
    $this->goalFor = $goalFor;
  }

  public function setGoalAgainst($goalAgainst)
  {
    $this->goalAgainst = $goalAgainst;
  }

  public function setGoalDifference($goalDifference)
  {
    $this->goalDifference = $goalDifference;
  }
  
// ********* toString ******************
  public function __toString()
  {
    return $this->name;
  }
  
}
