<?php
	require_once 'group.php';
	require_once 'match.php';
	require_once 'ranking.php';
	require_once 'team.php';

	$groupArray = array();
	$matchArray = array();
	$ranking = new Ranking();
	$teamArray = array();

	array_push($teamArray,new Team(1,'FCOC'));
	array_push($teamArray,new Team(2,'Rc Ancenis'));
	array_push($teamArray,new Team(3,'FCMTL'));
	array_push($teamArray,new Team(4,'Fc Herblanetz'));
	array_push($teamArray,new Team(5,'yolo'));
	array_push($teamArray,new Team(6,'test'));

	print_r($teamArray);

	$curGroup = new Group();

	$curGroup->addTeams($teamArray);
	array_push($groupArray,$curGroup);

	print_r($groupArray);	
