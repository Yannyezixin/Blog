     <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
            <!--阅读得最多的五篇文章-->
            <?php if(isset($contentbests)): ?>
            <div>
              <div class="list-group">
                <a href="#" class="list-group-item active"><h4>阅读得最多的五篇文章</h4></a>
                <?php foreach ($contentbests as $contentbest): ?>
                       <a href="http://localhost/recommend/artical?<?php echo "id=".$contentbest['id'];?>" class="list-group-item" >
                       <?php echo $contentbest['title'];?>--<?php echo $contentbest['name'];?>
                       (<?php echo $contentbest['see'];?>次阅读)</a>
                <?php endforeach; ?>
              </div>
            </div>
            <?php endif;?>
            
            <!--最新的十篇文章-->       
            <?php if(isset($contentnews)): ?>
            <div>
              <div class="list-group">
                <a href="#" class="list-group-item active"><h4>最新的十篇文章</h4></a>
                <?php foreach ($contentnews as $contentnew): ?>
                      <a href="http://localhost/recommend/artical?<?php echo "id=".$contentnew['id'];?>" class="list-group-item">
                         <?php echo $contentnew['title'];?>--<?php echo $contentnew['name'];?>
                      (<?php echo $contentnew['see'];?>次阅读)</a>
                <?php endforeach; ?>
              </div>
              <?php endif;?>
            </div>
         
            <!--所有分类-->
            <?php if(isset($catagories)):?>
            <div>
              <div class="list-group">
                <a href="#" class="list-group-item active"><h4>分类目录</h4></a>
              <?php foreach($catagories as $catagory):?>
                <a href="http://localhost/catagory?<?php echo 'id='.$catagory['id'];?>" class="list-group-item">
                   <?php echo $catagory['catagory'];?></a>
              <?php endforeach; ?>
              </div>
            </div>
            <?php endif;?>
         
            <!--所有标签-->
            <?php if(isset($tags)):?>
            <div>
              <div class="list-group">
                <a href="#" class="list-group-item active">标签</a>
              <?php foreach($tags as $tag):?>
                <a href="http://localhost/tag?<?php echo 'id='.$tag['id'];?>">
                  <span class="label label-danger"><?php echo $tag['tag'];?></span></a>
              <?php endforeach; ?>
              </div>
            </div>
            <?php endif;?>

        </div>