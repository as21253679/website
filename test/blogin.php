<?php session_start(); ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">   
</head>
<body>

<?php
if($_SESSION['id'] != null)
{
	echo '<a href="logout.php">登出</a>  <br><br>';
	echo  "<input type='button' value='新增' onclick=location.href='/insert.html'>";
	echo  "<input type='button' value='刪除' onclick=location.href='/delete.html'>";
	echo  "<input type='button' value='修改' onclick=location.href='/update.html'>";
}

     echo mysql_error();
//mysql_close($conn);
?>
</body>