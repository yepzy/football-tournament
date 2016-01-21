<?php
	require_once '../bean/team.php';
	require_once '../bean/teamSource.php';
	require_once '../bean/match.php';
	require_once '../bean/rankingMatch.php';

	/**
	*
	*/
	class DAO
	{
		private $connexion;

		/**
		* @function creation
		* create the tables in the DB
		*
		*/
		public function creation()
		{
			$this->connect();
			//Table TeamSource
			$this->connexion->query('CREATE TABLE TeamSource (
															id INT NOT NULL AUTO_INCREMENT,
															name VARCHAR(50) NOT NULL,
															PRIMARY KEY (id)
														);');
			//Table Team
			$this->connexion->query('CREATE TABLE Team (
															id INT NOT NULL AUTO_INCREMENT,
															state INT NOT NULL,
															group INT,
															idTeam INT NOT NULL,
															points INT,
															played INT,
															won INT,
															tieWithGoal INT,
															tieWithoutGoal INT,
															lost INT,
															GoalFor INT,
															GoalAgainst INT,
															GoalDifference INT,
															PRIMARY KEY (id),
															FOREIGN KEY (idTeam) REFERENCES TeamSource(id)
														);');
			//Table Match
			$this->connexion->query('CREATE TABLE Match (
															id INT NOT NULL AUTO_INCREMENT,
															State INT NOT NULL,
															Group INT,
															Team_1 VARCHAR(50) NOT NULL FOREIGN KEY REFERENCES TeamSource(id),
															Score_Team_1 INT(3),
															Score_Team_2 INT(3),
															Team_2 VARCHAR(50) NOT NULL FOREIGN KEY REFERENCES TeamSource(id),
															PRIMARY KEY (id),
															FOREIGN KEY (Team_1) REFERENCES TeamSource(id),
															FOREIGN KEY (Team_2) REFERENCES TeamSource(id)
														);');
			//Table RankingMatch
			$this->connexion->query('CREATE TABLE RankingMatch (
															id INT NOT NULL AUTO_INCREMENT,
															State INT NOT NULL,
															Team_1 VARCHAR(50) NOT NULL FOREIGN KEY REFERENCES TeamSource(id),
															Score_Team_1 INT(3),
															Score_Team_2 INT(3),
															Team_2 VARCHAR(50) NOT NULL FOREIGN KEY REFERENCES TeamSource(id),
															penalty BOOLEAN,
															rankWon INT(3) NOT NULL,
															rankLost INT(3) NOT NULL,
															PRIMARY KEY (id),
															FOREIGN KEY (Team_1) REFERENCES TeamSource(id),
															FOREIGN KEY (Team_2) REFERENCES TeamSource(id)
														);');
			//Table parameter
			$this->connexion->query('CREATE TABLE parameters (
															id INT NOT NULL AUTO_INCREMENT,
															name VARCHAR(50) NOT NULL,
															valueINT INT,
															valueSTR VARCHAR(50),
															PRIMARY KEY (id)
														);');
			$this->disconnect();
		}

		/**
		* @function connect
		* création the connection to the DB
		*
		*/
		private function connect()
		{
			try
		    {
				$this->connexion = new PDO('mysql:host=localhost;dbname=tournament','root','');
				$this->connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			}
		    catch(PDOException $e)
	    	{
				echo '<script>alert("'.$e->getMessage().'");</script>';
	      	}
		}

		/**
		* @function getParameters
		* get all parameters of the tournament
		*
		* @return Object[]
		*/
		public function getParameters()
		{
			try
			{
				$this->connect();
				return $this->connexion->query('SELECT * FROM parameters')->fetchAll();
				$this->disconnect();
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}

		/**
		* @function getParameter
		* get the value of the parameter given
		*
		* @param $name - type STRING - name of the parameter
		*
		* @return Object - depends of type of the value INT or STRING
		*/
		public function getParameter($name)
		{
			try
			{
				$this->connect();
				$res = $this->connexion->query('SELECT valueINT,valueSTR FROM parameters WHERE name='.$name)->fetch();
				$this->disconnect();
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
			return $res[0];
		}

		/**
		* @function tournamentExist
		* test if the tournament is already created
		*
		* @return BOOL - true if exist OR false if no exist
		*/
		public function tournamentExist()
		{
			try
			{
				$this->connect();
				$res = $this->connexion->query('SELECT * FROM parameters')->fetch();
				$this->disconnect();
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
			return !empty($res);
		}

		/**
		* @function disconnect
		* disconnect from the DB
		*/
		private function disconnect()
		{
			unset($this->connexion);
		}

		//TeamSource DAO #-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-
		/**
		* @function addTeam
		* add team from the teamSource in the DB
		*
		* @return TeamSource
		*/
		public function getTeamSrcList()
		{
			try
			{
				$this->connect();
				return $this->connexion->query('SELECT * FROM TeamSource')->fetchAll(PDO::FETCH_CLASS,'TeamSource');
				$this->disconnect();
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}

		/**
		* @function getTeamSrc
		* get the team of idTeam from the DB
		*
		* @param $idTeam	INT		id of the team
		*
		* @return TeamSource
		*/
		public function getTeamSrc($idTeam)
		{
			try
			{
				$this->connect();
				$team = $this->connexion->query('SELECT * FROM TeamSource WHERE id ='.$idTeam)->fetchAll(PDO::FETCH_CLASS,'TeamSource');
				return $team[0];
				$this->disconnect();
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}

		/**
		* @function addTeamSrc
		* add teamSrc in the DB
		*
		* @param $team		TeamSrc
		*/
		public function addTeamSrc($team)
		{
			try
			{
				$this->connect();
				$this->connexion->query('INSERT INTO TeamSource (name) VALUES ("'.$team->getName().'")');
				$this->disconnect();
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}

		/**
		* @function detTeamSrc
		* del TeamSrc in the DB
		*
		* @param $idTeam		INT		id of the team
		*/
		public function delTeamSrc($idTeam)
		{
			try
			{
				$this->connect();
				$this->connexion->query('DELETE FROM TeamSource WHERE id='.$idTeam);
				$this->disconnect();
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}

		//Team DAO  #-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#

		/**
		* @function getTeamList
		* get liste of team in a group of a state
		*
		* @param $numState			INT		number of the state
		* @param $numGroup			INT		number of the group
		*
		* @return Team[]
		*/
		public function getTeamList($numState,$numGroup)
		{
			try
			{
				$this->connect();
				return $this->connexion->query('SELECT * FROM Team WHERE state='.$numState.' ,group='.$numGroup)->fetchAll(PDO::FETCH_CLASS,'Team');
				$this->disconnect();
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}

		/**
		* @function addTeam
		* add team from the teamSource in the DB
		*
		* @param $idTeamSrc		INT		id of the match
		* @param $state			INT		number of the state
		* @param $group			INT		number of the group
		*/
		public function getTeam($idTeam)
		{
			try
			{
				$this->connect();
				$team = $this->connexion->query('SELECT * FROM Team WHERE idTeam ='.$idTeam)->fetchAll(PDO::FETCH_CLASS,'Team');
				return $team[0];
				$this->disconnect();
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}

		/**
		* @function addTeam
		* add team from the teamSource in the DB
		*
		* @param $idTeamSrc		INT		id of the team source
		* @param $state			INT		number of the state
		* @param $group			INT		number of the group
		*/
		public function addTeam($idTeamSrc,$state,$group)
		{
			try
			{_
				$this->connect();
				$this->connexion->query('INSERT INTO Team (idTeamSrc,state,group) VALUES ('.$idTeamSrc.','.$state.','.$group')');
				$this->disconnect();
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}

		/**
		* @function delTeam
		* delete the team in the DB
		*
		* @param $idTeam - type INT - id of the team
		*/
		public function delTeam($idTeam)
		{
			try
			{
				$this->connect();
				$this->connexion->query('DELETE FROM Team WHERE id='.$idTeam);
				$this->disconnect();
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}

		//Match DAO #-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#

		/**
		* @function getListMatch
		* get all match from a state
		*
		* @param $numState - Type INT - number of the state
		*
		* @return Match[]
		*/
		public function getListMatchState($numState)
		{
			try
			{
				$this->connect();
				return $this->connexion->query('SELECT * FROM Match WHERE state='.$numState)->fetchAll(PDO::FETCH_CLASS,'Match');
				$this->disconnect();
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}

		/**
		* @function getMatch
		* get the match in the DB
		*
		* @param $idMatch - type INT - id of the match
		*
		* @return Match
		*/
		public function getMatch($idMatch)
		{
			try
			{
				$this->connect();
				return $this->connexion->query('SELECT * FROM Match WHERE id='.$idMatch)->fetchAll(PDO::FETCH_CLASS,'Match');
				$this->disconnect();
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}

		/**
		* @function addMatch
		* add the match in the DB
		*
		* @param $match - type Match
		*/
		public function addMatch($match)
		{
			try
			{
				$this->connect();
				$this->connexion->query('INSERT INTO Match (hour,place,state,Team_1,scoreTeam_1,scoreTeam_2,Team_2) VALUES ("'.$match->getTime().'","'.$match->getPlace().'",'.$match->getState().','.$match->getEq1().','.$match->getScoreEq1().','.$match->Eq2().','.$match->scoreEq2().')');
				$this->disconnect();
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}

		/**
		* @function delMatch
		* delete the match in the DB
		*
		* @param $idMatch - type INT - id of the match
		*/
		public function delMatch($idMatch)
		{
			try
			{
				$this->connect();
				$this->connexion->query('DELETE FROM Match WHERE id='.$idMatch);
				$this->disconnect();
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}

		//RankingMatch DAO #-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-

		/**
		* @function getListRankingMatch
		* get all of the ranking match
		*
		* @return RankingMatch[]
		*/
		public function getListRankingMatch()
		{
			try
			{
				$this->connect();
				return $this->connexion->query('SELECT * FROM RankingMatch')->fetchAll(PDO::FETCH_CLASS,'RankingMatch');
				$this->disconnect();
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}

		/**
		* @function getRankingMatch
		* give the ranking match by given it id
		*
		* @param $idmatch - type int - id of the match
		*
		* @return RankingMatch
		*/
		public function getRankingMatch($idMatch)
		{
			try
			{
				$this->connect();
				return $this->connexion->query('SELECT * FROM RankingMatch WHERE id='.$idMatch)->fetchAll(PDO::FETCH_CLASS,'Match');
				$this->disconnect();
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}

		/**
		* @function addRankingMatch
		* adding the ranking match to the DB
		*
		* @param $match - type RankingMatch - the ranking match that you want to add in the DB
		*
		*/
		public function addRankingMatch($match)
		{
			try
			{
				$this->connect();
				$this->connexion->query('INSERT INTO RankingMatch (hour,place,state,Team_1,scoreTeam_1,scoreTeam_2,Team_2,rankWon,rankLost)
											VALUES ("'.$match->getTime().'","'.$match->getPlace().'",'.$match->getState().','.$match->getEq1().','.$match->getScoreEq1().','.$match->Eq2().','.$match->scoreEq2().','.$match->getRankWon().','.$match->getRankLost().')');
				$this->disconnect();
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}

		/**
		* @function delRankingMatch
		* delete the match in the DB
		*
		* @param $match - type RankingMatch - the ranking match that you want to delete in the DB
		*
		*/
		public function delRankingMatch($match)
		{
			try
			{
				$this->connect();
				$this->connexion->query('DELETE FROM RankingMatch WHERE id='.$match->getId());
				$this->disconnect();
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}


	}
