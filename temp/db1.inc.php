<?php
try
{
	$pdo = 'mysql:host=' . $name . ';dbname=' . $database_name;
	$pdo = new PDO($pdo,$root,$password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	 $pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{
	 $output = 'Unable to connect to the database server'.$e->getMessage();
	  include echo $output;
	 exit();
}
