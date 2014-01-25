<?php
//取出作者 
try
{
	$sql = 'SELECT id,name FROM yp_user';
	$result = $pdo->query($sql);
}
catch(PDOException $e)
{
	$output = 'error to fetching the user FROM the datebase'.$e->getMessage();
	include $_SERVER['DOCUMENT_ROOT'].'/includes/output.html.php';
	exit();
}
foreach ($result as $row) {
	$users[] = array('id' => $row['id'],'name' => $row['name']);
}