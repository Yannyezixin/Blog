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
       padding-left: 20px;
       padding-top: 20px; 
     }
    </style>
    <title>有谱网</title>
  </head>
    <body>
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-body">

      <!--include首页的导航栏-->
      <?php include $_SERVER['DOCUMENT_ROOT'].'/indexnav.html.php';?>
      <!--include侧边栏-->
      
      <!--被阅读得最多的五篇文章-->


      
        <!--所有的文章-->
        <div class="row row-offcanvas row-offcanvas-right">

          <div class="col-xs-12 col-sm-9">
            <?php if(isset($contents)): ?>

            <?php foreach ($contents as $content): ?>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <a href="http://localhost/recommend/artical?<?php echo "id=".$content['id'];?>">
                      <?php echo $content['title'];?></a>--<?php echo $content['name'];?>
                  </div>
                  <div class="panel-body">
                    分类目录：<span class="label label-default"><?php echo $content['catagory'];?></span>
                    <span class="label label-success"><?php echo $content['see']; ?>阅读</span>
                    <div><p><?php echo mb_substr($content['articaltext'],0,500); ?></p></div>
                    <div>标签：<span class="label label-danger"><?php echo $content['tag'];?> </span></div>
                    <div>
                      <a href="http://localhost/recommend/artical?<?php echo "id=".$content['id'];?>">阅读更多...</a>
                    </div>
                  </div>
              
            </div>
            <?php endforeach;?>
            <?php endif;?>
          </div>

        <!--侧边栏的html显示-->  
        <?php include $_SERVER['DOCUMENT_ROOT'].'/includes/getbestnewform.html.php';?>
      </div>

      </div>
      </div>
      </div><!--面板-->
    </body>
</html>