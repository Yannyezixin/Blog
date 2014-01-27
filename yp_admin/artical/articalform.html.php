<!--include了一个经过过滤的输出（在后台没必要） -->
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
        <title>文章|叶子鑫</title>
  </head>
   <body>
    <?php
      include $_SERVER['DOCUMENT_ROOT'].'/includes/logout.inc.php'; 
      include $_SERVER['DOCUMENT_ROOT'].'/includes/indexpagemodel.inc.php'; 
      include $_SERVER['DOCUMENT_ROOT'].'/includes/articalform.inc.php'; 
      include $_SERVER['DOCUMENT_ROOT'].'/includes/tagcatauser.html.php'; 
    ?>
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
                <!--显示文章列表-->
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
        </div>
      </div>
    </div>
   <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
   <script src="/js/bootstrap.min.js"></script>
   </body>
</html>