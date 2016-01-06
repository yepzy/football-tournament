<html>
<head>
	<title></title>
</head>
<body>
<?php
require_once 'DAO.php';

$dao = new DAO();

$dao->connect();
echo "############################ <br>TEST getTeamList()<br>############################ <br>";
$teamList = $dao->getTeamList();
foreach ($teamList as $value) {
	echo $value->getName().'<br>';
}
echo "############################ <br>TEST getTeam(idTeam)<br>############################ <br>";
echo $dao->getTeam(1)->getName();
echo "############################ <br>TEST addTeam(new Team(1,'FCOC'))<br>############################ <br>";
$dao->addTeam(new Team(1,'FCOC'));
echo "############################ <br>TEST getListMatchState(new Team(1,'FCOC'))<br>############################ <br>";
echo $dao->getListMatchState(1);
echo $dao->getListMatchState(2);
echo $dao->getListMatchState(3);
echo $dao->getMatch($idMatch);
$dao->addMatch($match);


$dao->disconnect();
?>
</body>
</html>
