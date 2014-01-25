<?php
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
        yp_tag_cont.tagid = yp_tag.id  ORDER BY see DESC LIMIT 5';
	$result = $pdo->query($sql);
}
catch(PDOException $e)
{
	$output = 'error to fetching the artical form the database'.$e->getMessage();
	include $_SERVER['DOCUMENT_ROOT'].'/includes/output.html.php';
	exit();
}
foreach ($result as $row) {
	$contentbests[] = array('id' => $row['id'],
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
        yp_tag_cont.tagid = yp_tag.id  ORDER BY post_date DESC LIMIT 10';
	$result = $pdo->query($sql);
}
catch(PDOException $e)
{
	$output = 'error to fetching the artical form the database'.$e->getMessage();
	include $_SERVER['DOCUMENT_ROOT'].'/includes/output.html.php';
	exit();
}
foreach ($result as $row) {
	$contentnews[] = array('id' => $row['id'],
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
	$sql = 'SELECT id,catagory FROM yp_catagory';
	$result = $pdo->query($sql);
}
catch(PDOException $e)
{
	$output = 'error to fetching the catagory form the database'.$e->getMessage();
	include $_SERVER['DOCUMENT_ROOT'].'/includes/output.html.php';
	exit();
}
foreach ($result as $row) {
	$catagorys[] = array('id' => $row['id'],
		'catagory' => $row['catagory']);
}
try
{
	$sql = 'SELECT id,tag FROM yp_tag';
	$result = $pdo->query($sql);
}
catch(PDOException $e)
{
	$output = 'error to fetching the tag form the database'.$e->getMessage();
	include $_SERVER['DOCUMENT_ROOT'].'/includes/output.html.php';
	exit();
}
foreach ($result as $row) {
	$tags[] = array('id' => $row['id'],
		'tag' => $row['tag']);
}