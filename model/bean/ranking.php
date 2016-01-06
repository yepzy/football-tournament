<?php
/**
* 
*/
class Ranking
{
	private $ranking;

	function __construct()
	{
		$this->ranking = array();
	}

	function addTeam($place,$team)
	{
		$this->ranking[$place] = $team;
	}

	function teamPlace($place)
	{
		return $this->ranking[$place];
	}

	function __toString()
	{
		return $this->ranking;
	}
}