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
  	<title>评论|叶子鑫</title>
  </head>
  <body>
  	<?php
    	include $_SERVER['DOCUMENT_ROOT'].'/includes/logout.inc.php';
    	include $_SERVER['DOCUMENT_ROOT'].'/includes/indexpagemodel.inc.php';
      include $_SERVER['DOCUMENT_ROOT'].'/includes/commentsform.inc.php';
  	?>
    <div class="container" >
      <div class="starter-template">
        <form action="" method="post">
          <table>
            <tr>
              <th><input type="hidden" name="action" value="删除">
                <button  type="submit" class="btn btn-default navbar-btn" >删除</button>
              <td align="center" ><b>评论内容</b></td>
              <td align="center" ><b>评论的文章</b></td>
            </tr>

            <!--显示所有评论及对应的评论文章-->
            <?php if(isset($comments)):?>
            <?php foreach($comments as $comment):?>
            <tr>
              <td align="center" >
                <input type="checkbox" name="ids[]" value="<?php htmlout($comment['id']);?>">
                <input type="hidden" name="contentids[]" value="<?php htmlout($comment['contentid']);?>">
              </td>
              <td align="center" ><?php echo $comment['comment']; ?></td>
              <td align="center" ><?php echo $comment['title']; ?></td>
            </tr>
            <?php endforeach;?>
            <?php endif;?>
            
          </table>
        </form>
      </div>
    </div>
    <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>