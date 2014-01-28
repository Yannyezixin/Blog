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
    <title><?php echo $content['title'];?>|叶子鑫 </title>
  </head>
  <body>
   <div class="container">
      <div class="panel panel-default">
        <div class="panel-body">
        <!--include首页的导航栏-->
        <?php include $_SERVER['DOCUMENT_ROOT'].'/indexnav.html.php';?>
            <div class="row row-offcanvas row-offcanvas-right">
              <!--<div class="panel panel-default">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body">
                    </div>
                </div>-->
              <div class="col-xs-12 col-sm-9">
                <!--文章的模块-->
                 <div class="panel panel-default">
                      <div>
                        <p>
                        <a href="http://localhost">首页</a>->
                        <a href="http://localhost/catagory?id=<?php echo $catagory['id']; ?>">
                         <span class="label label-default"><?php echo $content['catagory'];?></span>
                        </a>  
                        
                      <span class="label label-success"><?php echo $content['see']; ?>阅读</span>
                    </p>
                      </div>
                    <div class="panel-heading">
                      <h4><?php echo $content['title'];?>--<?php echo $content['name'];?></h4>
                    </div>
                    <div class="panel-body">
                      

                      <div>
                        <p>
                        <?php echo $content['articaltext'];?>
                      </p>  
                      </div>
                    
                    <div>
                      <hr/>
                      标签：<a href="http://localhost/tag?id=<?php echo $tag['id']; ?>">
                      <span class="label label-danger"><?php echo $content['tag'];?> </span>
                    </a> 
                    </div>
                    <hr/>
                

                    <!--相关文章的模块-->
                     <div class="panel panel-default">
                      <div class="panel-body">
                        <div>
                          <div>相关文章：</div>
                          <div>
                            <?php foreach ($contents as $content_other): ?>
                            <div>
                              <?php echo $content_other['post_date']; ?>
                              <a href="http://localhost/recommend/artical?<?php echo "id=".$content_other['id'];?>">
                                <?php echo $content_other['title'];?></a>--<?php echo $content_other['name'];?>
                                (<?php echo $content_other['see'];?>次阅读)
                            </div>       
                            <?php endforeach;?>
                          </div>
                        </div>
                      </div>
                    </div><hr/>

                    <!-- Duoshuo Comment BEGIN -->
                      <div class="ds-thread"></div>
                    <script type="text/javascript">
                    var duoshuoQuery = {short_name:"localhost"};
                      (function() {
                        var ds = document.createElement('script');
                        ds.type = 'text/javascript';ds.async = true;
                        ds.src = 'http://static.duoshuo.com/embed.js';
                        ds.charset = 'UTF-8';
                        (document.getElementsByTagName('head')[0] 
                        || document.getElementsByTagName('body')[0]).appendChild(ds);
                      })();
                      </script>
                    <!-- Duoshuo Comment END -->

                    <!--<!--评论显示的模块
                    <div class="panel panel-default">
                    <div class="panel-body">
                    <div>
                      <?php if(isset($comments)): ?> 
                      <hr/> 
                      <?php foreach ($comments as $comment): ?>
                      <div>
                        <blockquote>
                        <p><?php echo $comment['comment']; ?></P>
                      </blockquote>
                        <hr/>
                      </div>
                      <?php endforeach; ?>
                      <?php endif;?> 
                    </div>

                        <!--发表评论的模块
                        <div>
                          <div>发表评论</div>
                          <form action="?<?php echo 'id='.$_GET['id']; ?>" method="post"> 
                            <div>
                              <input type="text" name="username">昵称(必填)
                            </div>
                            <div>
                              <input type="text" name="useremail">电子邮箱(必填)
                            </div>
                            <div>
                              <textarea row="80" cols="100" name="comments"></textarea>
                            </div>
                            <div>
                              <input type="hidden" name="comment" value="comment" >
                              <input type="hidden" name="comment_number" value="<?php echo $content['comment_number'];?>">
                            <button  type="submit" class="btn btn-default navbar-btn" >发表评论</button>
                            </div>
                          </form>
                        </div>
                      </div>
                       </div>-->
                     </div>
                  </div>
                  </div>
                  <!--侧边栏-->
                  <?php include $_SERVER['DOCUMENT_ROOT'].'/includes/getbestnewform.html.php';?>

      </div>
    </div>
  </div>
  </body>
</html>