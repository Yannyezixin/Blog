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
    .divcss-box{padding-left: 10px;
      padding-top: 50px; }
    </style>
    <title>技术教程|叶子鑫</title>
    </head>
    <body>
      <div class="container">
      <div class="panel panel-default">
        <div class="panel-body">
           <?php include $_SERVER['DOCUMENT_ROOT'].'/indexnav.html.php';?>
           <div class="row row-offcanvas row-offcanvas-right">

              <div class="col-xs-12 col-sm-9">    
                <?php if(isset($contents)): ?>
                <?php foreach ($contents as $content): ?>
                <div class="panel panel-default">
                      <div class="panel-heading">
                      <a href="http://localhost/recommend/artical?<?php echo "id=".$content['id'];?>">
                        <?php echo $content['title'];?></a>--<?php echo $content['name'];?>
                     (<?php echo $content['see'];?>次阅读)
                    </div>
                    <div class="panel-body">
                      分类目录：<span class="label label-default"><?php echo $content['catagory'];?></span>
                      <span class="label label-success"><?php echo $content['see']; ?>阅读</span>
                      <?php echo mb_substr($content['articaltext'],0,500);?>
                      标签：<span class="label label-danger"><?php echo $content['tag'];?> </span>
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
  </div>
    </body>
  </html>