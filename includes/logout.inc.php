<!--此段代码为退出，退出后跳转到yp_admin的首页,显示登陆框-->
<form  action = "http://localhost/yp_admin/" method = "post" align="right">
	<div>
		<input type = "hidden" name = "action" value = "logout">
		<input type = "hidden" name = "goto" value= "../yp_admin/">
		<button  type="submit" class="btn btn-default navbar-btn" >登出</button>
	</div>
</form>
