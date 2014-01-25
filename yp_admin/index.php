<?php require_once $_SERVER['DOCUMENT_ROOT'].'/includes/access.inc.php';
//检测后台用户登陆
if(!userIsLoggedIn())
{
	include '../includes/login.inc.php';
	exit();
}
include 'indexpage.html.php';

