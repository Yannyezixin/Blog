<?php
include $_SERVER['DOCUMENT_ROOT'].'/includes/db.inc.php';
if(isset($_GET['id']))
{
	try
	{
	//关联与文章有关的表,并且取出相关的信息
		$sql = 'SELECT  yp_content.id,see,comment_number,articaltext,title,name,catagory,tag,post_date FROM yp_content
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
	        yp_tag_cont.tagid = yp_tag.id WHERE yp_tag.id = '.$_GET['id'].' ORDER BY see';
		$result = $pdo->query($sql);
	}
	catch(PDOException $e)
	{
		$output = 'error to fetching the artical form the database'.$e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'].'/includes/output.html.php';
		exit();
	}
	foreach ($result as $row) {
		$contenttags[] = array('id' => $row['id'],
			'see' => $row['see'],
			'comment_number' => $row['comment_number'],
			'articaltext' => $row['articaltext'],
			'title' => 	$row['title'],
			'name' => $row['name'],
			'catagory' => $row['catagory'],
			'tag' => $row['tag'],
			'post_date' => $row['post_date']);
   }
   try
   {
   	  $sql = 'SELECT tag FROM yp_tag WHERE id = :id';
   	  $s = $pdo->prepare($sql);
   	  $s->bindValue(':id',$_GET['id']);
   	  $s->execute();
   }
   catch(PDOException $e)
	{
		$output = 'error to fetching the tag form the database'.$e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'].'/includes/output.html.php';
		exit();
	}
	$tag = $s->fetch();
}

//侧边栏的信息
include $_SERVER['DOCUMENT_ROOT'].'/includes/getbestnew.html.php';
include $_SERVER['DOCUMENT_ROOT'].'/tag/tagindex.php';