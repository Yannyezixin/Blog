<!--被阅读得最多的五篇文章-->
      <div class="container">
        <div class=" divcss-box" >  
          <?php if(isset($contentbests)): ?>
          <?php foreach ($contentbests as $contentbest): ?>
            <div>
              <p>
                 <a href="http://localhost/recommend/artical?<?php echo "id=".$contentbest['id'];?>">
                 <?php echo $contentbest['title'];?></a>--<?php echo $contentbest['name'];?>
                 (<?php echo $contentbest['comment_number']; ?>/<?php echo $contentbest['see'];?>)
              </p> 
            </div>
          <?php endforeach; ?>
          <?php endif;?>
        </div>
      </div>

      <!--最新的7篇文章-->
      <div class="container">
        <div class=" divcss-box" >  
          <?php if(isset($contentnews)): ?>
          <?php foreach ($contentnews as $contentnew): ?>
            <div>
              <p>
                <a href="http://localhost/recommend/artical?<?php echo "id=".$contentnew['id'];?>">
                   <?php echo $contentnew['title'];?></a>--<?php echo $contentnew['name'];?>
                (<?php echo $contentnew['comment_number']; ?>/<?php echo $contentnew['see'];?>)
              </p> 
            </div>
          <?php endforeach; ?>
          <?php endif;?>
        </div>
      </div>

      <!--所有分类-->
      <div class="container">
        <div class=" divcss-box" > 
          <?php if(isset($catagories)):?>
          <?php foreach($catagories as $catagory):?>
          <p>
            <a href="http://localhost/catagory?<?php echo 'id='.$catagory['id'];?>">
               <?php echo $catagory['catagory'];?></a>
          </p>
          <?php endforeach; ?>
          <?php endif;?>
        </div>
      </div>

      <!--所有标签-->
      <div class="container">
        <div class=" divcss-box" > 
          <?php if(isset($tags)):?>
          <?php foreach($tags as $tag):?>
          <p>
            <a href="http://localhost/tag?<?php echo 'id='.$tag['id'];?>">
              <?php echo $tag['tag'];?></a>
          </p>
          <?php endforeach; ?>
          <?php endif;?>
        </div>
      </div>