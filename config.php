<?php

	$db_host='sql208.epizy.com';
	$db_user='Kunal20k';
	$db_pass='~bg|Ql?c@2\w^ujk';
	$db_name='epiz_29190737_kunal	';

	try {
		$pdo= new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	}catch(PDOException $e){
		echo $e->getMessage();
	}

?>