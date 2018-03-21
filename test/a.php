<?php session_start(); ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">   
</head>
<body>

<form action="/login.php" method="POST">
  帳號: <input type="text" name="user1"><br>
  密碼: <input type="password" name="password1"><br>
  <input type="submit" value="登入">
  <input type="button" value="註冊新會員" onClick="location.href='/register.html'">
</form>
</body>