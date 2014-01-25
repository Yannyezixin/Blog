<?php
include $_SERVER['DOCUMENT_ROOT'].'/includes/db.inc.php';
include $_SERVER['DOCUMENT_ROOT'].'/includes/catagory.inc.php';
include $_SERVER['DOCUMENT_ROOT'].'/includes/user.inc.php';
include $_SERVER['DOCUMENT_ROOT'].'/includes/tag.inc.php';

if(isset($_POST['publish']))
{
//在操作不完全时提醒其重新输入
	if(!isset($_POST['userid']) or $_POST['userid'] == ''
	 or !isset($_POST['catagoryid']) or $_POST['catagoryid'] == ''
	  or !isset($_POST['tagid']) or $_POST['tagid'] == ''
	   or !isset($_POST['content']) or $_POST['content'] == '')
	{
        $output = 'You should selete a catagory or tag';
        include $_SERVER['DOCUMENT_ROOT'].'/includes/output.html.php';
        exit();
	}
//插入yp_content表中，并且获取其id
	try
	{
		$sql = 'INSERT INTO yp_content SET 
		title = :title,
		articaltext = :articaltext';
		$s = $pdo->prepare($sql);
		$s->bindValue(':title',$_POST['title']);
		$s->bindValue(':articaltext',$_POST['content']);
		$s->execute();
	}
	catch(PDOException $e)
	{
		$output = 'fail to insert artical into database';
        include $_SERVER['DOCUMENT_ROOT'].'/includes/output.html.php';
        exit();
	}
	$contentid = $pdo->lastInsertId();
//插入三个关系表中
	try
	{
		$sql = 'INSERT INTO yp_cata_cont SET
		contentid = '.$contentid.',
		catagoryid = :catagoryid;
		INSERT INTO yp_tag_cont SET
		contentid = '.$contentid.',
		tagid = :tagid;
		INSERT INTO yp_user_cont SET 
		contentid = '.$contentid.',
		userid = :userid';
		$s = $pdo->prepare($sql);
		$s->bindValue(':catagoryid',$_POST['catagoryid']);
		$s->bindValue(':tagid',$_POST['tagid']);
		$s->bindValue(':userid',$_POST['userid']);
		$s->execute();
	}
	catch(PDOException $e)
	{
		$output = 'fail to insert relation into database';
        include $_SERVER['DOCUMENT_ROOT'].'/includes/output.html.php';
        exit();
	}
	header('Location:http://localhost/yp_admin/artical');
	exit();
}






include $_SERVER['DOCUMENT_ROOT'].'/yp_admin/artical/wartical/windex.html.php';