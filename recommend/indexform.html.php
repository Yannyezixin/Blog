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
    <title>推荐文章|叶子鑫</title>
  </head>
  <body>
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-body">
          <!--include首页的导航栏-->
          <?php include $_SERVER['DOCUMENT_ROOT'].'/indexnav.html.php';?>
            <div class="row row-offcanvas row-offcanvas-right">

                <div class="col-xs-12 col-sm-9">    
                  <?php if(isset($contents)): ?>
                  <div class="panel panel-default">
                    <div class="panel-body">
                      <?php foreach ($contents as $content): ?>
                        <div>
                          <p>
                          <?php echo $content['post_date']; ?>
                          <a href="http://localhost/recommend/artical?<?php echo "id=".$content['id'];?>">
                            <?php echo $content['title'];?></a>--<?php echo $content['name'];?>
                            (<?php echo $content['see'];?>次阅读)
                          </p>
                        </div>         
                      <?php endforeach;?>
                    </div>
                  </div>
                  <?php endif;?>
                </div>

               <?php include $_SERVER['DOCUMENT_ROOT'].'/includes/getbestnewform.html.php';?>

              </div>
        </div>
      </div>
    </div>
  </body>
</html>
