<?php
//取出分类目录
try
{
	$sql = 'SELECT id,catagory FROM yp_catagory';
	$result = $pdo->query($sql);
}
catch(PDOException $e)
{
	$output = 'error to fetching the catagory FROM the datebase'.$e->getMessage();
	include $_SERVER['DOCUMENT_ROOT'].'/includes/output.html.php';
	exit();
}
foreach ($result as $row) {
	$catagories[] = array('id' => $row['id'],'catagory' => $row['catagory']);
}