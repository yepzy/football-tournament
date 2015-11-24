<?php
	global $pdo;
	try {
		$pdo = new PDO('mysql:host=localhost;dbname=tournois', 'root', '');
		$pdo->exec("SET CHARACTER SET utf8");
		 // set the PDO error mode to exception
    	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    }
	catch(PDOException $e)
    {
    echo $e->getMessage();
    }