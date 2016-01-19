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
<<<<<<< HEAD
															id INT,
=======
															id INT NOT NULL AUTO_INCREMENT,
>>>>>>> 68d63f685d699b83c33736319e7f96bac5d9ff32
															name VARCHAR(50) NOT NULL,
															PRIMARY KEY (id)
														);');
			//Table Team
			$this->connexion->query('CREATE TABLE Team (
<<<<<<< HEAD
															id INT,
=======
															id INT NOT NULL AUTO_INCREMENT,
>>>>>>> 68d63f685d699b83c33736319e7f96bac5d9ff32
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
<<<<<<< HEAD
															id INT,
=======
															id INT NOT NULL AUTO_INCREMENT,
>>>>>>> 68d63f685d699b83c33736319e7f96bac5d9ff32
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
<<<<<<< HEAD
															id INT,
															State INT NOT NULL,
															Group INT,
=======
															id INT NOT NULL AUTO_INCREMENT,
															State INT NOT NULL,
>>>>>>> 68d63f685d699b83c33736319e7f96bac5d9ff32
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
<<<<<<< HEAD
														);');			
=======
														);');	
			//Table parameter
			$this->connexion->query('CREATE TABLE parameters (
															id INT NOT NULL AUTO_INCREMENT,
															name VARCHAR(50) NOT NULL,
															valueINT INT,
															valueSTR VARCHAR(50),
															PRIMARY KEY (id)
														);');		
>>>>>>> 68d63f685d699b83c33736319e7f96bac5d9ff32
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

<<<<<<< HEAD
=======
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

>>>>>>> 68d63f685d699b83c33736319e7f96bac5d9ff32
		//TeamSource DAO
		public function getTeamSrcList()
		{
			try
			{
<<<<<<< HEAD
				return $this->connexion->query('SELECT * FROM TeamSource')->fetchAll(PDO::FETCH_CLASS,'TeamSource');
=======
				$this->connect();
				return $this->connexion->query('SELECT * FROM TeamSource')->fetchAll(PDO::FETCH_CLASS,'TeamSource');
				$this->disconnect();
>>>>>>> 68d63f685d699b83c33736319e7f96bac5d9ff32
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}
<<<<<<< HEAD

=======
>>>>>>> 68d63f685d699b83c33736319e7f96bac5d9ff32
		public function getTeamSrc($idTeam)
		{
			try
			{
<<<<<<< HEAD
				$team = $this->connexion->query('SELECT * FROM TeamSource WHERE id ='.$idTeam)->fetchAll(PDO::FETCH_CLASS,'TeamSource');
				return $team[0];
=======
				$this->connect();
				$team = $this->connexion->query('SELECT * FROM TeamSource WHERE id ='.$idTeam)->fetchAll(PDO::FETCH_CLASS,'TeamSource');
				return $team[0];
				$this->disconnect();
>>>>>>> 68d63f685d699b83c33736319e7f96bac5d9ff32
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}
<<<<<<< HEAD

=======
>>>>>>> 68d63f685d699b83c33736319e7f96bac5d9ff32
		public function addTeamSrc($team)
		{
			try
			{
<<<<<<< HEAD
				$this->connexion->query('INSERT INTO TeamSource (name) VALUES ("'.$team->getName().'")');
=======
				$this->connect();
				$this->connexion->query('INSERT INTO TeamSource (name) VALUES ("'.$team->getName().'")');
				$this->disconnect();
>>>>>>> 68d63f685d699b83c33736319e7f96bac5d9ff32
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}
<<<<<<< HEAD

=======
>>>>>>> 68d63f685d699b83c33736319e7f96bac5d9ff32
		public function deleteTeamSrc($idTeam)
		{
			try
			{	
<<<<<<< HEAD
				$this->connexion->query('DELETE FROM TeamSource WHERE id='.$idTeam);
=======
				$this->connect();
				$this->connexion->query('DELETE FROM TeamSource WHERE id='.$idTeam);
				$this->disconnect();
>>>>>>> 68d63f685d699b83c33736319e7f96bac5d9ff32
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}

		//Team DAO
<<<<<<< HEAD

=======
>>>>>>> 68d63f685d699b83c33736319e7f96bac5d9ff32
		public function getTeamList($numState,$numGroup)
		{
			try
			{
<<<<<<< HEAD
				return $this->connexion->query('SELECT * FROM Team WHERE state='.$numState.' ,group='.$numGroup)->fetchAll(PDO::FETCH_CLASS,'Team');
=======
				$this->connect();
				return $this->connexion->query('SELECT * FROM Team WHERE state='.$numState.' ,group='.$numGroup)->fetchAll(PDO::FETCH_CLASS,'Team');
				$this->disconnect();
>>>>>>> 68d63f685d699b83c33736319e7f96bac5d9ff32
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}
<<<<<<< HEAD

=======
>>>>>>> 68d63f685d699b83c33736319e7f96bac5d9ff32
		public function getTeam($idTeam)
		{
			try
			{
<<<<<<< HEAD
				$team = $this->connexion->query('SELECT * FROM Team WHERE idTeam ='.$idTeam)->fetchAll(PDO::FETCH_CLASS,'Team');
				return $team[0];
=======
				$this->connect();
				$team = $this->connexion->query('SELECT * FROM Team WHERE idTeam ='.$idTeam)->fetchAll(PDO::FETCH_CLASS,'Team');
				return $team[0];
				$this->disconnect();
>>>>>>> 68d63f685d699b83c33736319e7f96bac5d9ff32
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}
<<<<<<< HEAD

=======
>>>>>>> 68d63f685d699b83c33736319e7f96bac5d9ff32
		public function addTeam($team)
		{
			try
			{
<<<<<<< HEAD
				$this->connexion->query('INSERT INTO Team (state,group,idTeam) VALUES ("'.$team->getName().'")');
=======
				$this->connect();
				$this->connexion->query('INSERT INTO Team (state,group,idTeam) VALUES ("'.$team->getName().'")');
				$this->disconnect();
>>>>>>> 68d63f685d699b83c33736319e7f96bac5d9ff32
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}
<<<<<<< HEAD

=======
>>>>>>> 68d63f685d699b83c33736319e7f96bac5d9ff32
		public function deleteTeam($idTeam)
		{
			try
			{	
<<<<<<< HEAD
				$this->connexion->query('DELETE FROM Team WHERE id='.$idTeam);
=======
				$this->connect();
				$this->connexion->query('DELETE FROM Team WHERE id='.$idTeam);
				$this->disconnect();
>>>>>>> 68d63f685d699b83c33736319e7f96bac5d9ff32
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
<<<<<<< HEAD
				return $this->connexion->query('SELECT * FROM Match WHERE state='.$numState)->fetchAll(PDO::FETCH_CLASS,'Match');
=======
				$this->connect();
				return $this->connexion->query('SELECT * FROM Match WHERE state='.$numState)->fetchAll(PDO::FETCH_CLASS,'Match');
				$this->disconnect();
>>>>>>> 68d63f685d699b83c33736319e7f96bac5d9ff32
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}
<<<<<<< HEAD

=======
>>>>>>> 68d63f685d699b83c33736319e7f96bac5d9ff32
		public function getMatch($idMatch)
		{
			try
			{
<<<<<<< HEAD
				return $this->connexion->query('SELECT * FROM Match WHERE id='.$idMatch)->fetchAll(PDO::FETCH_CLASS,'Match');
=======
				$this->connect();
				return $this->connexion->query('SELECT * FROM Match WHERE id='.$idMatch)->fetchAll(PDO::FETCH_CLASS,'Match');
				$this->disconnect();
>>>>>>> 68d63f685d699b83c33736319e7f96bac5d9ff32
			}
			catch(PDOException $e)
			{
				echo '<script>alert("'.$e->getMessage().'");</script>';
			}
		}
<<<<<<< HEAD

=======
>>>>>>> 68d63f685d699b83c33736319e7f96bac5d9ff32
		public function addMatch($match)
		{
			try
			{
<<<<<<< HEAD
				$this->connexion->query('INSERT INTO Match (hour,place,state,Team_1,scoreTeam_1,scoreTeam_2,Team_2) VALUES ("'.$match->getTime().'","'.$match->getPlace().'",'.$match->getState().','.$match->getEq1().','.$match->getScoreEq1().','.$match->Eq2().','.$match->scoreEq2().')');
=======
				$this->connect();
				$this->connexion->query('INSERT INTO Match (hour,place,state,Team_1,scoreTeam_1,scoreTeam_2,Team_2) VALUES ("'.$match->getTime().'","'.$match->getPlace().'",'.$match->getState().','.$match->getEq1().','.$match->getScoreEq1().','.$match->Eq2().','.$match->scoreEq2().')');
				$this->disconnect();
>>>>>>> 68d63f685d699b83c33736319e7f96bac5d9ff32
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
<<<<<<< HEAD
				$this->connexion->query('DELETE FROM Match WHERE id='.$match->getId());
=======
				$this->connect()
				$this->connexion->query('DELETE FROM Match WHERE id='.$match->getId());
				$this->disconnect();
			}
>>>>>>> 68d63f685d699b83c33736319e7f96bac5d9ff32
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