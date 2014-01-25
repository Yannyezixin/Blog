<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/html.inc.php';?>
<!DOCTYPE html>
  <html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/yp_admin.css">
        <title>文章</title>
       <script language="javascript" type="text/javascript" src="http://localhost/js/tinymce/tinymce.min.js"></script>
       <script language="javascript" type="text/javascript">
        tinyMCE.init({
          mode : "textareas" 
        });
        </script>
    </head>
    <body>
    <?php
    include $_SERVER['DOCUMENT_ROOT'].'/includes/logout.inc.php'; 
    include $_SERVER['DOCUMENT_ROOT'].'/includes/indexpagemodel.inc.php'; 
    include $_SERVER['DOCUMENT_ROOT'].'/includes/articalform.inc.php'; ?>
     <div class="container">
     <div class="jumbotron">
      <div class="starter-template">
    <form action="" method="post" >
        <div>
            <select name="userid">
                <option value="">作者</option>
                 <?php foreach($users as $user): ?>
                <option value="<?php htmlout($user['id']); ?>"
                    <?php if(isset($content['name']) and $content['name']== $user['name'] )echo ' selected'; ?>
                    ><?php htmlout($user['name']); ?></option>
                <?php endforeach; ?>
            </select>   
            <select name="catagoryid" >
                <option value="" >所有目录</option>
                <?php foreach($catagories as $catagory): ?>
                <option value="<?php htmlout($catagory['id']); ?>"
                    <?php if(isset($content['catagory']) and $content['catagory'] == $catagory['catagory'])
                    echo ' selected'; ?>><?php htmlout($catagory['catagory']);?></option>
                <?php endforeach; ?>
            </select>
        
            <select name="tagid">
                <option value="">所有标签</option>
                 <?php foreach($tags as $tag): ?>
                <option value="<?php htmlout($tag['id']); ?>"
                    <?php if(isset($content['tag']) and $content['tag'] == $tag['tag'])
                    echo ' selected'; ?>><?php htmlout($tag['tag']);?></option>
                <?php endforeach; ?>
            </select>      
        </div>
        <div>
            <b>标题：</b></br>
            <input type="text" name="title" value="<?php if(isset($content['title'])) echo $content['title'] ?>">
        </div>
        <div>
        <b>正文：</b>
        </div>
        <div>
        <textarea row="70" cols="80" name="content">
            <?php if(isset($content['articaltext']))echo $content['articaltext'];?></textarea>
        </div>
        <div><input type="hidden" name="contentid" value="<?php if(isset($_GET['id']))echo $_GET['id']; ?>" >
            <input type="hidden" name="publish" value="publish">
            <input type="submit" value="发布">
        </div>
    </form>
     </div>
       </div>
   </div>
   <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    </body>
</html>
