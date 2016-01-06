<?php
	
	/**
	* 
	*/
	class Match
	{
		private $hour;
		private $place;
		private $Team_1;
		private $Team_2;
		private $scoreTeam_1;
		private $scoreTeam_2;
		private $state;
		private $group;

		public function __construct($hour,$place,$state,$group,$group,$Team_1,$Team_2)
		{
			$this->hour = $hour;
			$this->place = $place;
			$this->phase = $phase;
			$this->group = $group;
			$this->Team_1 = $Team_1;
			$this->Team_2 = $Team_2;
			$this->scoreTeam_1 = -1;
			$this->scoreTeam_2 = -1;
		}

// ********* GET ******************		

		public function getTeam_1()
		{
			return $this->Team_1;
		}

		public function getTeam_2()
		{
			return $this->Team_2;
		}

		public function getScoreTeam_1()
		{
			return $this->scoreTeam_1;
		}

		public function getScoreTeam_2()
		{
			return $this->scoreTeam_2;
		}

		public function getHour()
		{
			return $this->hour;
		}

		public function getPlace()
		{
			return $this->place;
		}

		public function getPhase()
		{
			return $this->phase;
		}

		publc funtion getGroup()
		{
			return $this->group;
		}

// ********* SET ******************		

		public function setTeam_1($Team_)
		{
			$this->Team_1 = $Team_;
		}

		public function setTeam_2($Team_)
		{
			$this->Team_2 = $Team_;
		}

		public function setScoreTeam_1($score)
		{
			$this->scoreTeam_1 = $score;
		}

		public function setScoreTeam_2($score)
		{
			$this->scoreTeam_2 = $score;
		}

		public function setHour($hour)
		{
			$this->hour = $hour;
		}

		public function setPlace($place)
		{
			$this->place = $place;
		}

		public function setPhase($phase)
		{
			$this->phase = $phase;
		}

		public function setGroup($group)
		{
			$this->group = $group;
		}

// ********* toString ******************	

		public function __toString()
		{
			if($this->scoreTeam_1 == -1 && $this->scoreTeam_2 == -1)
				return $this->Team_1.'  -  '.$this->Team_2;

			return $this->hour.' '.$this->place.' '.$this->Team_1.' '.$this->scoreTeam_1.' - '.$this->scoreTeam_2.' '.$this->Team_2;
		}	
	}
