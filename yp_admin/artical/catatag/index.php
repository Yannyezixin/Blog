<?php
//连接数据库 
include $_SERVER['DOCUMENT_ROOT'].'/includes/db.inc.php';

//标签与分类目录共用同个模板，通过传进一个字符串来区分
try
{
	$sql = 'SELECT id,'.$_GET['get'].' FROM yp_'.$_GET['get'];
	$result = $pdo->query($sql);
}
catch(PDOException $e)
{
	$output = 'error to fetching the tag from the datebase'.$e->getMessage();
	include $_SERVER['DOCUMENT_ROOT'].'/includes/output.html.php';
	exit();
}
foreach ($result as $row) {
	$catatagforms[] = array('id' => $row['id'],$_GET['get'] => $row[$_GET['get']]);
}
if ($_GET['get'] == 'catagory') {
	$catatag = '分类目录';
	$cata_tag = 'yp_cata_cont';
}
else{
	$catatag = '标签';
	$cata_tag = 'yp_tag_cont';
}
//表单传递，删除，批量删除相关信息
if(isset($_POST['ids']))
{
//删除yp_catagory表中的对应分类目录及yp_cata_cont表中的对应分类，文章关系
//标签类似
	try
	{
		$sql = 'DELETE FROM yp_'.$_GET['get'].' WHERE id = :id;
	    UPDATE '.$cata_tag.'SET '.$_GET['get'].'id WHERE '.$_GET['get'].'id = :catatagid';
		foreach($_POST['ids'] as $id)
		{
			$s = $pdo->prepare($sql);
	        $s->bindValue(':id',$id);
	        $s->bindValue(':catatagid',$id);
	        $s->execute();
		}
	}
	catch(PDOException $e)
	{
		$output = 'error to delete the '.$_GET['get'].' from the database'.$e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'].'/includes/output.html.php';
		exit();
	}
	header('Location: http://localhost/yp_admin/artical/catatag/?get='.$_GET['get']);
	exit();
}
//添加分类目录或表单
if(isset($_POST['addcatatag']))
{
	try
	{
		$sql = 'INSERT INTO yp_'.$_GET['get'].' SET '.$_GET['get'].' = :catatag';
		$s = $pdo->prepare($sql);
		$s->bindValue(':catatag',$_POST['catatag']);
		$s->execute();
	}
	catch(PDOException $e)
	{
		$output = 'error to insert '.$_GET['get'].' into the database'.$e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'].'/includes/output.html.php';
		exit();
	}
    header('Location: http://localhost/yp_admin/artical/catatag/?get='.$_GET['get']);
	exit();
}

//显示模板
include $_SERVER['DOCUMENT_ROOT'].'/yp_admin/artical/catatag/catatagform.html.php';