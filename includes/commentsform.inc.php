<div class="container" >

      <div class="starter-template">
    <ul class="nav nav-tabs">
 	 <li <?php if(!isset($_GET['2'])) echo 'class="active"'; ?>>
 	 	<a href="http://localhost/yp_admin/comments/" style="text-decoration:none">所有评论</a></li>
 	 <li <?php if(isset($_GET['2'])) echo 'class="active"';?>>
 	 	<a href="http://localhost/yp_admin/comments/?2" style="text-decoration:none">未添加</a></li>
 </ul>
 </div>
</div>


