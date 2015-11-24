<?php
	require 'db-connect.php';
	require 'equipeClass.php';
	require 'matchClass.php';
	
?>
<html>
<head>
	<title>Test</title>
	<META HTTP-EQUIV="Refresh" CONTENT="5">
</head>
<body>
	<?php
		//	  __construct($nom        	,$points,$matchGagner	,$matchNulAvecBut	,$matchNulSansBut	,$matchPerdu	,$ButMis	,$ButPris)
		$eq1 = new Equipe(-1,"FCOC"		,0		,0				,0					,0					,0				,0			,0);
		$eq2 = new Equipe(-1,"Rc Ancenis"	,0		,0				,0					,0					,0				,0			,0);

		echo 'Eq1 : '.$eq1.'<br> Eq2 : '.$eq2.'<br>';
		$eq1->createDB($pdo);
		$eq2->createDB($pdo);
		$match = new Match($eq1,$eq2);

		echo 'Match : '.$match;

		$match->setScoreEq1(1);
		$match->setScoreEq2(0);
		echo 'Match : '.$match;
	?>

</body>
</html>