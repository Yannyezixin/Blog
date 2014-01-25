<!-- 登陆表单-->
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/includes/html.inc.php'; ?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
  	<title>登陆</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/login.css">
  </head>
  <body>
    <?php if(isset($loginError)): ?>
      <p><?php htmlout($loginError); ?></p>
     <?php endif; ?>
    <div class="container">

      <form class="form-signin" role="form" action = "" method = "post">
        <h2 class="form-signin-heading" align="center">后台登陆</h2>
        <input type="text" name = "name" class="form-control" placeholder="账号" required autofocus>
        <input type="password" name = "password"  class="form-control" placeholder="密码" required>
        <input type = "hidden" name = "action" value = "login">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> 记住我
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">登陆</button>
      </form>
 
  </body>
</html>
