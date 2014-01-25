<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/html.inc.php';?>
<!DOCTYPE html>
  <html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/yp_admin.css">
        <title>文章</title>
    </head>
    <body>
    <?php
    include $_SERVER['DOCUMENT_ROOT'].'/includes/logout.inc.php'; 
    include $_SERVER['DOCUMENT_ROOT'].'/includes/indexpagemodel.inc.php'; 
    include $_SERVER['DOCUMENT_ROOT'].'/includes/articalform.inc.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/includes/tagcatauser.html.php'; ?>
    <div class="container">
    <div class="jumbotron">
      <div class="starter-template">
    <form action="" method="post">
    <table>
        <tr>
            <th><input type="hidden" name="action" value="删除">
              <button  type="submit" class="btn btn-default navbar-btn" >删除</button></th>
            <th>标题</th> 
            <th>作者</th>
            <th>分类目录</th>
            <th>标签</th>
            <th>日期</th>
        </tr>
        <?php if(isset($contents)): ?>
        <?php foreach($contents as $content): ?>
          <tr>
            <td align="center" ><input type="checkbox" name="ids[]"
               value="<?php htmlout($content['id']);?>"></td>
            <td><?php htmlout($content['title']); ?></td>
            <td><?php htmlout($content['name']);?></td>
            <td><?php htmlout($content['catagory']);?></td>
            <td><?php htmlout($content['tag']); ?></td>
            <td><?php htmlout($content['post_date']); ?></td>
            <td><a href="http://localhost/yp_admin/artical?id=<?php htmlout($content['id']);?>">
              <button  type="button" class="btn btn-default navbar-btn" >编辑</button></a></td>
          </tr>
        <?php endforeach; ?>
         <?php endif; ?>
    </table> 
        </form>
        <!-- <?php if(isset($contents)): ?>
        <?php foreach($contents as $content): ?>
        <form action="" method="post">
        当对文章进行编辑时，传进相关信息，在文章编辑界面显示原有信息
        <table>
              <tr>
                <input type="hidden" name="catagory" value="<?php htmlout($content['catagory']);?>">
                <input type="hidden" name="tag" value="<?php htmlout($content['tag']);?>">
                <input type="hidden" name="name" value="<?php htmlout($content['name']); ?>">
                <input type="hidden" name="content_id" value="<?php htmlout($content['id']);?>">
                <input type="hidden" name="title_" value="<?php echo $content['title']; ?>">
                <input type="hidden" name="articaltext" value="<?php echo $content['articaltext']; ?>">
                <input type="hidden" name="edit" value="edit">
                <input type="submit" value="编辑" ></tr>
        </table>
        </form>
         <?php endforeach; ?>
               <?php endif; ?>-->
           </div>
       </div>
     </div>
     <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    </body>
  </html>