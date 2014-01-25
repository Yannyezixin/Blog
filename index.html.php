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
       <!--被阅读得最多的-->
       <div class="container">
       <div class=" divcss-box" >  
        <?php if(isset($contentbests)): ?>
            <?php foreach ($contentbests as $contentbest): ?>
              <div><p><a href="http://localhost/recommend/artical?<?php echo "id=".$contentbest['id'];?>">
                <?php echo $contentbest['title'];?></a>
             --<?php echo $contentbest['name'];?>
             (<?php echo $contentbest['comment_number']; ?>/<?php echo $contentbest['see'];?>)</p> </div>
          <?php endforeach; ?>
        <?php endif;?>
       </div>
     </div>
     <!--最新的7篇文章-->
     <div class="container">
       <div class=" divcss-box" >  
        <?php if(isset($contentnews)): ?>
            <?php foreach ($contentnews as $contentnew): ?>
              <div><p><a href="http://localhost/recommend/artical?<?php echo "id=".$contentnew['id'];?>">
                <?php echo $contentnew['title'];?></a>
             --<?php echo $contentnew['name'];?>
             (<?php echo $contentnew['comment_number']; ?>/<?php echo $contentnew['see'];?>)</p> </div>
          <?php endforeach; ?>
        <?php endif;?>
       </div>
     </div>
     <!--所有分类-->
      <div class="container">
       <div class=" divcss-box" > 
        <?php if(isset($catagorys)):?>
        <?php foreach($catagorys as $catagory):?>
        <p><a href="http://localhost/catagory?<?php echo 'id='.$catagory['id'];?>"><?php echo $catagory['catagory'];?></a> </p>
      <?php endforeach; ?>
    <?php endif;?>
         </div>
    </div>
    <!--所有标签-->
    <div class="container">
       <div class=" divcss-box" > 
        <?php if(isset($tags)):?>
        <?php foreach($tags as $tag):?>
        <p><a href="http://localhost/tag?<?php echo 'id='.$tag['id'];?>"><?php echo $tag['tag'];?></a> </p>
      <?php endforeach; ?>
    <?php endif;?>
       </div>
    </div>
     <!--所有的文章-->
        <div class="container">
       <div class=" divcss-box" >      
            <?php if(isset($contents)): ?>
            <?php foreach ($contents as $content): ?>
            <div>
            <p><a href="http://localhost/recommend/artical?<?php echo "id=".$content['id'];?>"><?php echo $content['title'];?></a>
             --<?php echo $content['name'];?>
             (<?php echo $content['comment_number']; ?>/<?php echo $content['see'];?>)</p> 
             <p><?php echo $content['articaltext']; ?></p>
              
              </div>      
              <div><p><a href="http://localhost/recommend/artical?<?php echo "id=".$content['id'];?>">阅读更多...</a></p> </div>
          <?php endforeach;?>
        <?php endif;?>
      </div>
    </div>
    </body>
  </html>