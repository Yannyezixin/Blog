<?php
//连接数据库
include $_SERVER['DOCUMENT_ROOT'].'/includes/db.inc.php';

//删除评论
if(isset($_POST['action']) and $_POST['action'] == '删除')
{
	try
	{
		$sql = 'DELETE FROM yp_comment WHERE id = :id';
		foreach($_POST['ids'] as $id)
		{
			$s = $pdo->prepare($sql);
			$s->bindValue(':id',$id);
			$s->execute();
		}
	}
	catch(PDOException $e)
	{
		$output = 'error to delete the comments from the yp_comment'.$e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'].'/includes/output.html.php';
		exit();
	}
	//BUG 评论删除时对应减一条评论数，但对应记录被清零
	try
	{
		$sql = 'UPDATE yp_content SET comment_number = comment_number - 1 WHERE id = :contentid';
        foreach($_POST['contentids'] as $contentid)
        {
        	$s = $pdo->prepare($sql);
        	$s->bindValue(':contentid',$contentid);
        	$s->execute();
        }
	}
	catch(PDOException $e)
	{
		$output = 'error to update the comment_number from the yp_content'.$e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'].'/includes/output.html.php';
		exit();
	}
	header('Location: .');
	exit();
}


//取出所有评论及对应的评论文章
try
{
	$sql = "SELECT yp_comment.id,comment,title,contentid FROM yp_comment LEFT JOIN yp_content ON yp_content.id = contentid";
	$s = $pdo->query($sql);
}
catch(PDOException $e)
{
	$output = 'error to fetching the comments from the yp_comment'.$e->getMessage();
	include $_SERVER['DOCUMENT_ROOT'].'/includes/output.html.php';
	exit();
}
foreach($s as $row)
{
	$comments[] = array('id' => $row['id'],
		'comment' => $row['comment'],
		'title' => $row['title'],
		'contentid' => $row['contentid']);
}
include $_SERVER['DOCUMENT_ROOT'].'/yp_admin/comments/comments.html.php';