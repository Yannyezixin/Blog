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
    <title>推荐文章|叶子鑫</title>
  </head>
  <body>
      <!--include首页的导航栏-->
      <?php include $_SERVER['DOCUMENT_ROOT'].'/indexnav.html.php';?>
      
      <div class="container">
        <div class=" divcss-box" >      
            <?php if(isset($contents)): ?>
            <?php foreach ($contents as $content): ?>
              <div>
                <?php echo $content['post_date']; ?>
                <a href="http://localhost/recommend/artical?<?php echo "id=".$content['id'];?>">
                  <?php echo $content['title'];?></a>--<?php echo $content['name'];?>
                  (<?php echo $content['comment_number']; ?>/<?php echo $content['see'];?>)
              </div>         
            <?php endforeach;?>
            <?php endif;?>
        </div>
      </div>
  </body>
</html>
