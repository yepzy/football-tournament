<?php
/**
* 
*/
class Classement
{
	
	private $classement;

	function __construct()
	{
		$this->classement = array();
	}

	function ajouterEquipe($place,$eq)
	{
		$this->classement[$place] = $eq;
	}

	function equipePlace($place)
	{
		return $this->classement[$place];
	}

	function __toString()
	{
		return $this->classement;
	}
}