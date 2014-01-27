<!--这段是对作者，分类目录，标签进行select-->
<div class="container">
 <div class="starter-template">
  <form action="" method="post" >
        <div>
            <select name="userid">
                <option value="">作者</option>
                 <?php foreach($users as $user): ?>
                <option value="<?php htmlout($user['id']); ?>"
                    <?php if(isset($_POST['userid']) AND $_POST['userid'] == $user['id'] )echo ' selected'; ?>
                    ><?php htmlout($user['name']); ?></option>
                <?php endforeach; ?>
            </select>
            <select name="catagoryid" >
                <option value="" >所有目录</option>
                <?php foreach($catagories as $catagory): ?>
                <option value="<?php htmlout($catagory['id']); ?>"
                    <?php if(isset($_POST['catagoryid']) AND $_POST['catagoryid'] == $catagory['id'])
                    echo ' selected'; ?>><?php htmlout($catagory['catagory']);?></option>
                <?php endforeach; ?>
            </select>
            <select name="tagid">
                <option value="">所有标签</option>
                 <?php foreach($tags as $tag): ?>
                <option value="<?php htmlout($tag['id']); ?>"
                    <?php if(isset($_POST['tagid']) AND $_POST['tagid'] == $tag['id'])
                    echo ' selected'; ?>><?php htmlout($tag['tag']);?></option>
                <?php endforeach; ?>
            </select>
            <input type="hidden" name="action" value="search" >
            <button  type="submit" class="btn btn-default navbar-btn" >选择</button>
        </div>
  </form>
 </div>
</div>