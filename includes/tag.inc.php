<?php
//取出标签
try
{
	$sql = 'SELECT id,tag FROM yp_tag';
	$result = $pdo->query($sql);
}
catch(PDOException $e)
{
	$output = 'error to fetching the tag FROM the datebase'.$e->getMessage();
	include $_SERVER['DOCUMENT_ROOT'].'/includes/output.html.php';
	exit();
}
foreach ($result as $row) {
	$tags[] = array('id' => $row['id'],'tag' => $row['tag']);
}