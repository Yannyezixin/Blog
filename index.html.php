<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/index.css">
    <style>
     .divcss-box
     {
       padding-left: 10px;
       padding-top: 50px; 
     }
    </style>
    <title>有谱网</title>
  </head>
    <body>
      <!--include首页的导航栏-->
      <?php include $_SERVER['DOCUMENT_ROOT'].'/indexnav.html.php';?>
      <!--include侧边栏-->
      <?php include $_SERVER['DOCUMENT_ROOT'].'/includes/getbestnewform.html.php';?>

     <!--所有的文章-->
      <div class="container">
        <div class=" divcss-box" >      
          <?php if(isset($contents)): ?>
          <?php foreach ($contents as $content): ?>
            <div>
              <p>
                <a href="http://localhost/recommend/artical?<?php echo "id=".$content['id'];?>">
                  <?php echo $content['title'];?></a>--<?php echo $content['name'];?>
               (<?php echo $content['comment_number']; ?>/<?php echo $content['see'];?>)
              </p> 
              <p><?php echo $content['articaltext']; ?></p>
            </div>      
            <div>
              <a href="http://localhost/recommend/artical?<?php echo "id=".$content['id'];?>">阅读更多...</a>
            </div>
          <?php endforeach;?>
          <?php endif;?>
        </div>
      </div>
    </body>
</html>