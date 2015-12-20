<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>无标题文档</title>
<style type="text/css">

#main {
	height: 210px;
	width: 600px;
}
#non1 {
	height: 100px;
	width: 600px;
}
#lg {
	height: 110px;
	width: 200px;
	float:left;
}
#admin {
	float: right;
	height: 90px;
	width: 380px;
	border: thick solid #0F0;
}
</style>
</head>

<body>


  <div id="main">
    <div id="non1"></div>
    <div id="lg" ><img name="" src="../release/images/LOGO.jpg" width="200" height="110" alt="" style="background-color: #00FF00" /></div>
    <div id="admin">
    <form id="form" name="form" onsubmit="return chkinput(form)" method="post" action="login_chk2.php">
      <table width="300" border="0" align="center">
        <tr>
          <td colspan="2">用户名：
            <label for="name"></label>
          <input type="text" name="name" id="name" /></td>
        </tr>
        <tr>
          <td colspan="2">密码：               
            <label for="pass"></label>
             <input type="password" name="pass" id="pass" /></td>
        </tr>
        <tr>
          <td><input type="submit" name="submit" id="submit" value="登录" /></td>
          <td><input type="reset" name="reset" id="reset" value="重置" /></td>
        </tr>
      </table>
      </form>
    </div>
  </div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
</body>
</html>
