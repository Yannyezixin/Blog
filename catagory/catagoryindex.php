<!DOCTYPE html>
  <html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/index.css">
    <style>
    .divcss-box
    {
      padding-left: 10px;
      padding-top: 50px; 
    }
    </style>
    <title><?php if(isset($catagory['catagory']))echo $catagory['catagory']; ?>|叶子鑫</title>
  </head>
  <body>
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-body">
          <!--首页的导航栏-->
          <?php include $_SERVER['DOCUMENT_ROOT'].'/indexnav.html.php';?>

          <!--被阅读得最多的-->
            <div class="row row-offcanvas row-offcanvas-right">

                <div class="col-xs-12 col-sm-9">
                  <?php if(isset($contentcatagories)): ?>
                  <div class="panel panel-default">
                    <div class="panel-body">
                      <div>分类目录：<?php if(isset($catagory['catagory']))echo $catagory['catagory']; ?></div>
                      <?php foreach ($contentcatagories as $contentcatagory): ?>
                        <div><p><a href="http://localhost/recommend/artical?<?php echo "id=".$contentcatagory['id'];?>">
                          <?php echo $contentcatagory['title'];?></a>
                       --<?php echo $contentcatagory['name'];?>
                       (<?php echo $contentcatagory['comment_number']; ?>/<?php echo $contentcatagory['see'];?>)</p> </div>
                      <?php endforeach; ?>
                    </div>
                  </div>
                  <?php endif;?>
                </div>
             <!--侧边栏的html显示-->  
              <?php include $_SERVER['DOCUMENT_ROOT'].'/includes/getbestnewform.html.php';?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>