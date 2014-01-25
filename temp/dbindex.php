<?php

if(isset($_POST['update']))
{
	echo '正在连接数据库';

	$name = $_POST['name'];
	$database_name = $_POST['database_name'];
	$root = $_POST['root'];
	$password = $_POST['password'];

	include 'db.inc.php';
	echo "连接成功";
	exit();
}
include 'linkform.html.php';





