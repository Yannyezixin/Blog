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
     <div class="container">
     <div class="jumbotron">
      <div class="starter-template">
    <form action="" method="post">
    <table>
        <tr>
            <td><input type="hidden" name="delete" value="delete" >
                <button  type="submit" class="btn btn-default navbar-btn" >删除</button></td>
            <th>名称</th>
        </tr>
     <?php if(isset($catatagforms)): ?>
     <?php foreach($catatagforms as $catatagform): ?>
        <tr>
            <td align="center" ><input type="checkbox" name="ids[]"
               value="<?php htmlout($catatagform['id']);?>"></td>
            <td><?php htmlout($catatagform[$_GET['get']]); ?></td>
        </tr>
     <?php endforeach; ?>
     <?php endif;?>
    </table>
    </form>
    <h3>添加新<?php echo $catatag; ?></h3>
    <form action="" method="post" >
        <div>名称：
            <input type="text" name="catatag">
            <input type="hidden" name="addcatatag" value="addcatatag">
            <button  type="submit" class="btn btn-default navbar-btn" >添加</button>
        </div>
    </form>
    </div>
       </div>
   </div>
   <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    </body>
</html>