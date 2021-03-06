<?php
//连接数据库
include $_SERVER['DOCUMENT_ROOT'].'/includes/db.inc.php';
//显示id为$_GET['di']的文章
if(isset($_GET['id']))
{
  try
  {
      //关联与文章有关的表,并且取出相关的信息
      $sql = 'SELECT  see,articaltext,comment_number,title,name,catagory,tag,post_date FROM yp_content
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
            yp_tag_cont.tagid = yp_tag.id WHERE yp_content.id='.$_GET['id'];
         $result = $pdo->query($sql);
    }
  catch(PDOException $e)
  {
      $output = 'error to fetching the artical form the database'.$e->getMessage();
      include $_SERVER['DOCUMENT_ROOT'].'/includes/output.html.php';
      exit();
  }

  //指定文章的所有相关信息都存放在$content
  $content = $result -> fetch();

  //更新文章的浏览数
  try
  {
    $sql = 'UPDATE yp_content SET see = '.$content['see'].'+1 WHERE id = '.$_GET['id'];
    $s = $pdo ->query($sql);
  }
  catch(PDOException $e)
  {
    $output = 'error to fetching the artical form the database'.$e->getMessage();
    include $_SERVER['DOCUMENT_ROOT'].'/includes/output.html.php';
    exit();
  }

  //取出指定文章的目录的id
  try
  {
    $sql = 'SELECT id FROM yp_catagory WHERE catagory = :catagory';
    $s = $pdo->prepare($sql);
    $s->bindValue(':catagory',$content['catagory']);
    $s->execute();
  }
  catch(PDOException $e)
  {
    $output = 'error to fetching the catagoryid form the database'.$e->getMessage();
    include $_SERVER['DOCUMENT_ROOT'].'/includes/output.html.php';
    exit();
  }
  $catagory = $s->fetch();
  
  //取出指定文章的标签的id
  try
  {
    $sql = 'SELECT id FROM yp_tag WHERE tag = :tag';
    $s = $pdo->prepare($sql);
    $s->bindValue(':tag',$content['tag']);
    $s->execute();
  }
  catch(PDOException $e)
  {
    $output = 'error to fetching the tagid form the database'.$e->getMessage();
    include $_SERVER['DOCUMENT_ROOT'].'/includes/output.html.php';
    exit();
  }
  $tag = $s->fetch();
  
  //取出相同目录所有的文章，显示在相关文章的HTML上
  try
  {
    $sql = 'SELECT  yp_content.id,see,articaltext,title,name,catagory,tag,post_date FROM yp_content
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
        yp_tag_cont.tagid = yp_tag.id WHERE catagory = :catagory ORDER BY post_date';
    $result = $pdo->prepare($sql);
    $result->bindValue(':catagory',$content['catagory']);
    $result->execute();
  }
  catch(PDOException $e)
  {
    $output = 'error to fetching the relation artical form the database'.$e->getMessage();
    include $_SERVER['DOCUMENT_ROOT'].'/includes/output.html.php';
    exit();
   }
  foreach ($result as $row) {
    $contents[] = array('id' => $row['id'],
      'see' => $row['see'],
      'articaltext' => $row['articaltext'],
      'title' =>  $row['title'],
      'name' => $row['name'],
      'catagory' => $row['catagory'],
      'tag' => $row['tag'],
      'post_date' => $row['post_date']);
  }

  //取出指定文章的评论
  try
  {
    $sql = 'SELECT id,comment FROM yp_comment WHERE contentid = '.$_GET['id'];
    $s = $pdo->query($sql);
  }
  catch(PDOException $e)
  {
    $output = 'error to fetching the comment form the database'.$e->getMessage();
    include $_SERVER['DOCUMENT_ROOT'].'/includes/output.html.php';
    exit();
   }
    foreach ($s as $row) {
     $comments[] = array('id' => $row['id'],
     'comment' => $row['comment']);
  }
}

//对文章的评论操作
if(isset($_POST['comments']))
{
  try
  {
    $sql = 'INSERT INTO yp_comment SET comment = :comment,
    contentid = :contentid';
    $s = $pdo->prepare($sql);
    $s->bindValue(':comment',$_POST['comments']);
    $s->bindValue(':contentid',$_GET['id']);
    $s->execute();
  }
  catch(PDOException $e)
  {
    $output = 'error to insert comment into yp_comment'.$e->getMessage();
    include $_SERVER['DOCUMENT_ROOT'].'/includes/output.html.php';
    exit();
  }
  try
  {
    $sql = 'UPDATE yp_content SET comment_number = '.$_POST['comment_number'].' + 1 WHERE id = '.$_GET['id'];
    $s = $pdo->query($sql);
  }
  catch(PDOException $e)
  {
     $output = 'error to update comment_number into yp_conent'.$e->getMessage();
     include $_SERVER['DOCUMENT_ROOT'].'/includes/output.html.php';
     exit();
  }
}

//侧边栏的信息
include $_SERVER['DOCUMENT_ROOT'].'/includes/getbestnew.html.php';

//显示页面的所有信息
include $_SERVER['DOCUMENT_ROOT'].'/recommend/artical/indexartical.html.php';
