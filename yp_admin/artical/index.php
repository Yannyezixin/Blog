<?php
//连接数据库
include $_SERVER['DOCUMENT_ROOT'].'/includes/db.inc.php';
//从数据库中取出用户
include $_SERVER['DOCUMENT_ROOT'].'/includes/user.inc.php';
//从数据库中取出所有分类目录
include $_SERVER['DOCUMENT_ROOT'].'/includes/catagory.inc.php';
//从数据库中取出所有标签
include $_SERVER['DOCUMENT_ROOT'].'/includes/tag.inc.php';
//删除文章
//选择性查看文章

if(isset($_POST['action']) and $_POST['action'] == '删除')
{
   try
   {
	   	  $sql = 'DELETE FROM yp_content WHERE id = :id;
	   	  DELETE FROM yp_cata_cont WHERE contentid = :contentid;
	   	  DELETE FROM yp_user_cont WHERE contentid = :user_cont_id;
	   	  DELETE FROM yp_tag_cont WHERE contentid = :tag_cont_id;
	   	  DELETE FROM yp_comment WHERE contentid = :yp_comment_id';   	  
	   	  foreach ($_POST['ids'] as $id) {
	   	  	$s = $pdo->prepare($sql);
	   	  	$s->bindValue(':id',$id);
	   	  	$s->bindValue(':contentid',$id);
	   	  	$s->bindValue(':user_cont_id',$id);
	   	  	$s->bindValue(':tag_cont_id',$id);
	   	  	$s->bindValue(':yp_comment_id',$id);
	   	  	$s->execute();
	      }
   }
   catch(PDOException $e)
   {
   	    $output = "error to delete the artical".$e->getMessage();
	    include $_SERVER['DOCUMENT_ROOT'].'/includes/output.html.php';
	    exit();
   }
   header('Location: .');
   exit();
}


//更新文章
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
		$sql = 'UPDATE yp_content SET 
		title = :title,
		articaltext = :articaltext
		WHERE id = :id';
		$s = $pdo->prepare($sql);
		$s->bindValue(':id',$_POST['contentid']);
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
		$sql = 'UPDATE yp_cata_cont SET
		catagoryid = :catagoryid WHERE
		contentid = '.$_POST['contentid'].';
		UPDATE yp_tag_cont SET 
		tagid = :tagid WHERE
		contentid = '.$_POST['contentid'].';
		UPDATE yp_user_cont SET 
		userid = :userid WHERE
		contentid = '.$_POST['contentid'];
		$s = $pdo->prepare($sql);
		$s->bindValue(':catagoryid',$_POST['catagoryid']);
		$s->bindValue(':tagid',$_POST['tagid']);
		$s->bindValue(':userid',$_POST['userid']);
		$s->execute();
	}
	catch(PDOException $e)
	{
		$output = 'fail to update relation into database';
        include $_SERVER['DOCUMENT_ROOT'].'/includes/output.html.php';
        exit();
	}
	header('Location:http://localhost/yp_admin/artical');
	exit();
}
//显示原有文章结构
if(isset($_GET['id']))
{
	try
    {
//关联与文章有关的表,并且取出相关的信息
	$sql = 'SELECT  articaltext,title,name,catagory,tag,post_date FROM yp_content
        LEFT JOIN yp_cata_cont ON
        yp_content.id = yp_cata_cont.contentid 
        LEFT JOIN yp_catagory ON
        yp_cata_cont.catagoryid = yp_catagory.id
        LEFT JOIN yp_user_cont ON 
        yp_content.id = yp_user_cont.contentid
        LEFT JOIN yp_user ON
        yp_user_cont.userid = yp_user.id
        LEFT JOIN yp_tag_cont ON
        yp_content.id = yp_tag_cont.contentid
        LEFT JOIN yp_tag ON
        yp_tag_cont.tagid = yp_tag.id  WHERE yp_content.id='.$_GET['id'];
	   $result = $pdo->query($sql);
    }
	catch(PDOException $e)
	{
		$output = 'error to fetching the artical form the database'.$e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'].'/includes/output.html.php';
		exit();
	}
    $content = $result -> fetch();
	include $_SERVER['DOCUMENT_ROOT'].'/yp_admin/artical/wartical/windex.html.php';
	exit();
}
if(isset($_POST['action']) and $_POST['action'] == 'search')
{
	$where = ' WHERE TRUE ';
	
	$placeholders = array();

	if($_POST['catagoryid'] != '')
	{
        $where .= " AND yp_catagory.id = :catagoryid";
        $placeholders[':catagoryid'] = $_POST['catagoryid'];
	}
	if($_POST['tagid'] != '')
	{
		$where .= " AND yp_tag.id = :tagid";
		$placeholders[':tagid'] = $_POST['tagid'];
	}
	if($_POST['userid'] != '')
	{
		$where .=" AND yp_user.id = :userid";
		$placeholders[':userid'] = $_POST['userid'];
	}
	$select = 'SELECT  yp_content.id,articaltext,title,name,catagory,tag,post_date FROM yp_content
        LEFT JOIN yp_cata_cont ON
        yp_content.id = yp_cata_cont.contentid 
        LEFT JOIN yp_catagory ON
        yp_cata_cont.catagoryid = yp_catagory.id
        LEFT JOIN yp_user_cont ON 
        yp_content.id = yp_user_cont.contentid
        LEFT JOIN yp_user ON
        yp_user_cont.userid = yp_user.id
        LEFT JOIN yp_tag_cont ON
        yp_content.id = yp_tag_cont.contentid
        LEFT JOIN yp_tag ON
        yp_tag_cont.tagid = yp_tag.id '.$where;
	try
	{
		$sql = $select ;
		$s = $pdo->prepare($sql);
		$s->execute($placeholders);
	}
	catch(PDOException $e)
	{
		$output = "error fetch the artical".$e->getMessage();
	    include $_SERVER['DOCUMENT_ROOT'].'/includes/output.html.php';
	    exit();
	}
	foreach ($s as $row) {
	$contents[] = array('id' => $row['id'],
		'articaltext' => $row['articaltext'],
		'title' => 	$row['title'],
		'name' => $row['name'],
		'catagory' => $row['catagory'],
		'tag' => $row['tag'],
		'post_date' => $row['post_date']);
    }
   include 'articalform.html.php';
   exit();
}
//显示所有的文章
include $_SERVER['DOCUMENT_ROOT'].'/includes/getcontent.inc.php';
include 'articalform.html.php';