<?php

	$db_host='sql6.freemysqlhosting.net';
	$db_user='sql6426694';
	$db_pass='Q9nNyFwrRa';
	$db_name='sql6426694';

	try {
		$pdo= new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	}catch(PDOException $e){
		echo $e->getMessage();
	}

?>