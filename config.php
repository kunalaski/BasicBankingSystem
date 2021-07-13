<?php

	$db_host='sql6.freemysqlhosting.net';
	$db_user='sql6424870';
	$db_pass='hWktF4FaMr';
	$db_name='sql6424870';

	try {
		$pdo= new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	}catch(PDOException $e){
		echo $e->getMessage();
	}

?>