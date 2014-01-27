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

    <!--include首页的导航栏-->
    <?php include $_SERVER['DOCUMENT_ROOT'].'/indexnav.html.php';?>
      <div class="container">
        <div class=" divcss-box" >

          <!--文章的模块-->
          <div>
            <div>
              <a href="http://localhost">首页</a>->
              <a href="http://localhost/catagory?id=<?php echo $catagory['id']; ?>"><?php echo $content['catagory']; ?></a>  
            </div> 
            <div>
              <h2><?php echo $content['title'];?></h2>
            </div>
            <div>
              <?php echo $content['articaltext'];?>
            </div>
            <div>
              标签：<a href="http://localhost/tag?id=<?php echo $tag['id']; ?>"><?php echo $content['tag']; ?></a> 
            </div>
          </div>

          <!--相关文章的模块-->
          <div>
            <div>相关文章：</div>
            <div>
              <?php foreach ($contents as $content_other): ?>
              <div>
                <?php echo $content_other['post_date']; ?>
                <a href="http://localhost/recommend/artical?<?php echo "id=".$content_other['id'];?>">
                  <?php echo $content_other['title'];?></a>--<?php echo $content_other['name'];?>
                  (/<?php echo $content_other['see'];?>)
              </div>       
              <?php endforeach;?>
            </div>
          </div>

          <!--评论显示的模块-->
          <div>
            <?php if(isset($comments)): ?>  
            <?php foreach ($comments as $comment): ?>
            <div>
              <?php echo $comment['comment']; ?>
            </div>
            <?php endforeach; ?>
            <?php endif;?> 
          </div>

          <!--发表评论的模块-->
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
      </div>
  </body>
</html>