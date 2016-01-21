<?php
	session_start();


    // Use Package
	require_once 'model/DAO/DAO.php';
	$dao = new DAO();

	if($dao->tournamentExist())
	{
?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>FCOC - Home tournament</title>
	</head>
	<body>
		<a class="btn btn-info" href="creation.php?type=tounament">Création Tournois</a>
	<?php
		$parameter = $dao->getParameter("nbPhase");
		for ($i=2; $i <= $parameter['valueINT']; $i++) {
	?>
		<a href="creation.php?type=phase&nb=<?=$i?>">Création Phase <?=$i?></a>
	<?php
		}
	?>
		<a href="/creation.php?type=group">Creation Group<a>
	</body>
	</html>
<?php
	}
?>
