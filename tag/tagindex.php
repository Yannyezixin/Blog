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
    <title>标签|叶子鑫</title>
  </head>
  <body>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/indexnav.html.php';?>
       <!--被阅读得最多的-->
      <div class="container">
        <div class=" divcss-box" >  
          <?php if(isset($contenttags)): ?>
          <?php foreach ($contenttags as $contenttag): ?>
            <div><p><a href="http://localhost/recommend/artical?<?php echo "id=".$contenttag['id'];?>">
                <?php echo $contenttag['title'];?></a> --<?php echo $contenttag['name'];?>
                (<?php echo $contenttag['comment_number']; ?>/<?php echo $contenttag['see'];?>)</p> </div>
          <?php endforeach; ?>
          <?php endif;?>
        </div>
      </div>
  </body>
</html>