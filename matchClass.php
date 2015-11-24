<?php
	
	/**
	* 
	*/
	class Match
	{
		
		function __construct($eq1,$eq2)
		{
			$this->eq1 = $eq1;
			$this->eq2 = $eq2;
			$this->scoreEq1 = -1;
			$this->scoreEq2 = -1;
		}

// ********* GET ******************		

		function getEq1()
		{
			return $this->eq1;
		}

		function getEq2()
		{
			return $this->eq2;
		}

		function getScoreEq1()
		{
			return $this->scoreEq1;
		}

		function getScoreEq2()
		{
			return $this->scoreEq2;
		}

// ********* SET ******************		

		function setEq1($eq)
		{
			$this->eq1 = $eq;
		}

		function setEq2($eq)
		{
			$this->eq2 = $eq;
		}

		function setScoreEq1($score)
		{
			$this->scoreEq1 = $score;
		}

		function setScoreEq2($score)
		{
			$this->scoreEq2 = $score;
		}

// ********* toString ******************	

		function __toString()
		{
			if($this->scoreEq1 == -1 && $this->scoreEq2 == -1)
				return $this->eq1.'  -  '.$this->eq2;

			return $this->eq1.' '.$this->scoreEq1.' - '.$this->scoreEq2.' '.$this->eq2;
		}	
	}
