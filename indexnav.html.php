
  <div class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="http://localhost/">有谱！</a>
    </div>
      <div>
        <ul class="nav navbar-nav">
          <li <?php if(isset($_GET['1'])) echo 'class="active"';?>  ><a href="http://localhost/recommend?1">推荐文章</a></li>
          <li <?php if(isset($_GET['2'])) echo 'class="active"';?>><a href="http://localhost/lesson?2">技术教程</a></li>
          <li <?php if(isset($_GET['3'])) echo 'class="active"';?>><a href="http://localhost/footmark?3">足迹</a></li>
          <!--给我留言的模块先搁置不做
          <li <?php if(isset($_GET['4'])) echo 'class="active"';?>><a href="http://localhost/words?4">给我留言</a></li>
          -->
          <li <?php if(isset($_GET['5'])) echo 'class="active"';?>><a href="http://localhost/aboutyoubookee?5">关于有谱网</a></li>
          <li <?php if(isset($_GET['6'])) echo 'class="active"';?>><a href="http://localhost/aboutme?6">关于我</a></li>          
        <ul>
      </div> 
  </div>
