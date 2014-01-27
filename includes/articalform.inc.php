<!--文章的导航栏-->
<div class="container" >
 <div class="starter-template">
    <ul class="nav nav-tabs">
 	 <li <?php if(!isset($_GET['2']) and !isset($_GET['get'])) echo 'class="active"'; ?> ><a href="http://localhost/yp_admin/artical/" style="text-decoration:none">所有文章</a></li>
 	 <li <?php if(isset($_GET['2'])) echo 'class="active"';?>>
 		<a href="http://localhost/yp_admin/artical/wartical?2" style="text-decoration:none">写文章</a></li>
 	 <li <?php if(isset($_GET['get']) and $_GET['get'] == 'catagory') echo 'class="active"';?>>
        <a href="http://localhost/yp_admin/artical/catatag?get=catagory" style="text-decoration:none">分类目录</a></li>
 	 <li <?php if(isset($_GET['get']) and $_GET['get'] == 'tag') echo 'class="active"';?>>
 		<a href="http://localhost/yp_admin/artical/catatag?get=tag" style="text-decoration:none">标签</a></li>
    </ul>
 </div>
</div>


