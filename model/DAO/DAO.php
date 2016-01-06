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

		public function creation()
		{
			$this->connect();
			//Table TeamSource
			$this->connexion->query('CREATE TABLE TeamSource (
															id INT,
															name VARCHAR(50) NOT NULL,
															PRIMARY KEY (id)
														);');
			//Table Team
			$this->connexion->query('CREATE TABLE Team (
															id INT,
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
															id INT,
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
															id INT,
															State INT NOT NULL,
															Group INT,
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
			$this->disconnect();
		}

		public function connect()
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

		//TeamSource DAO
		public function getTeamSrcList()
		{
			try
			{
				return $this->connexion->query('SELECT * FROM TeamSource')->fetchAll(PDO::FETCH_CLASS,'TeamSource');
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}

		public function getTeamSrc($idTeam)
		{
			try
			{
				$team = $this->connexion->query('SELECT * FROM TeamSource WHERE id ='.$idTeam)->fetchAll(PDO::FETCH_CLASS,'TeamSource');
				return $team[0];
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}

		public function addTeamSrc($team)
		{
			try
			{
				$this->connexion->query('INSERT INTO TeamSource (name) VALUES ("'.$team->getName().'")');
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}

		public function deleteTeamSrc($idTeam)
		{
			try
			{	
				$this->connexion->query('DELETE FROM TeamSource WHERE id='.$idTeam);
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}

		//Team DAO

		public function getTeamList($numState,$numGroup)
		{
			try
			{
				return $this->connexion->query('SELECT * FROM Team WHERE state='.$numState.' ,group='.$numGroup)->fetchAll(PDO::FETCH_CLASS,'Team');
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}

		public function getTeam($idTeam)
		{
			try
			{
				$team = $this->connexion->query('SELECT * FROM Team WHERE idTeam ='.$idTeam)->fetchAll(PDO::FETCH_CLASS,'Team');
				return $team[0];
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}

		public function addTeam($team)
		{
			try
			{
				$this->connexion->query('INSERT INTO Team (state,group,idTeam) VALUES ("'.$team->getName().'")');
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}

		public function deleteTeam($idTeam)
		{
			try
			{	
				$this->connexion->query('DELETE FROM Team WHERE id='.$idTeam);
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}

		//Match DAO
		public function getListMatchState($numState)
		{
			try
			{
				return $this->connexion->query('SELECT * FROM Match WHERE state='.$numState)->fetchAll(PDO::FETCH_CLASS,'Match');
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}

		public function getMatch($idMatch)
		{
			try
			{
				return $this->connexion->query('SELECT * FROM Match WHERE id='.$idMatch)->fetchAll(PDO::FETCH_CLASS,'Match');
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}

		public function addMatch($match)
		{
			try
			{
				$this->connexion->query('INSERT INTO Match (hour,place,state,Team_1,scoreTeam_1,scoreTeam_2,Team_2) VALUES ("'.$match->getTime().'","'.$match->getPlace().'",'.$match->getState().','.$match->getEq1().','.$match->getScoreEq1().','.$match->Eq2().','.$match->scoreEq2().')');
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}
		public function delMatch($match)
		{
			try
			{
				$this->connexion->query('DELETE FROM Match WHERE id='.$match->getId());
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}

		//RankingMatch DAO
		public function getListRankingMatch()
		{
			try
			{
				return $this->connexion->query('SELECT * FROM RankingMatch')->fetchAll(PDO::FETCH_CLASS,'RankingMatch');
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}

		public function getRankingMatch($idMatch)
		{
			try
			{
				return $this->connexion->query('SELECT * FROM RankingMatch WHERE id='.$idMatch)->fetchAll(PDO::FETCH_CLASS,'Match');
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}

		public function addRankingMatch($match)
		{
			try
			{
				$this->connexion->query('INSERT INTO RankingMatch (hour,place,state,Team_1,scoreTeam_1,scoreTeam_2,Team_2,rankWon,rankLost) 
											VALUES ("'.$match->getTime().'","'.$match->getPlace().'",'.$match->getState().','.$match->getEq1().','.$match->getScoreEq1().','.$match->Eq2().','.$match->scoreEq2().','.$match->getRankWon().','.$match->getRankLost().')');
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}
		public function delRankingMatch($match)
		{
			try
			{
				$this->connexion->query('DELETE FROM RankingMatch WHERE id='.$match->getId());
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}
		//Disconnect
		public function disconnect()
		{
			unset($this->connexion);
		}
	}