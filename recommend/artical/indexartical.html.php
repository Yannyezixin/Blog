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
    </head>
    <body>
       <?php include $_SERVER['DOCUMENT_ROOT'].'/indexnav.html.php';?>
        <div class="container">
       <div class=" divcss-box" >
        <p>首页-><?php echo $content['catagory']; ?> 
        <!--<button  type="button" class="btn btn-default navbar-btn" ><a href="">发表评论</a></button></p>-->
         <h2><?php echo $content['title'];?></h2></p> 
         <p><?php echo $content['articaltext'];?></p>
         <p>标签：<?php echo $content['tag']; ?></p>
         <p></p>
         <p>相关文章：</p>
          <?php foreach ($contents as $content_other): ?>
            <p><?php echo $content_other['post_date']; ?>
              <a href="http://localhost/recommend/artical?<?php echo "id=".$content_other['id'];?>"><?php echo $content_other['title'];?></a>
             --<?php echo $content_other['name'];?>
             (/<?php echo $content_other['see'];?>)</p>       
          <?php endforeach;?>
           <?php if(isset($comments)): ?>  
          <p>-----------------------------------------------------------</p>
          <?php foreach ($comments as $comment): ?>
           <p><?php echo $comment['comment']; ?></p>
           <p>-----------------------------------------------------------</p>
         <?php endforeach; ?>
          <?php endif;?> 
          <p>发表评论</p>
          <form action="?<?php echo 'id='.$_GET['id']; ?>" method="post"> 
          <p><input type="text" name="username">昵称(必填)</p>
          <p><input type="text" name="useremail">电子邮箱(必填)</p>
          <textarea row="80" cols="100" name="comments"></textarea>
          <p><input type="hidden" name="comment" value="comment" >
            <input type="hidden" name="comment_number" value="<?php echo $content['comment_number'];?>">
          <button  type="submit" class="btn btn-default navbar-btn" >发表评论</button></p>
          </form>
       </div>
     </div>
    </body>
  </html>