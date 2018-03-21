<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">   
</head>

<body>

<?php
     $dbhost = 'localhost';
     $dbuser = 'admin';
     $dbpass = 'admin';
     $dbname = 'test';

     $title = $_POST['title'];
     $content = $_POST['content'];
     $image = $_FILES['upfile']['name'];
     $error = $_FILES["upfile"]["error"];
	 $id=$_GET["id"];
	 
$conn = mysql_connect($dbhost, $dbuser, $dbpass) ;//連接資料庫
 mysql_query("SET NAMES UTF8");//設定語系
  mysql_select_db($dbname);

if ( $_FILES["upfile"]["error"] <= 0 ) 
{
	move_uploaded_file($_FILES['upfile']['tmp_name'],"images/".iconv('utf-8','big5', $image));   // 搬移上傳檔案 可中文
}  

//更新資料
if(!empty($image))
{
 $sql="UPDATE farmer SET title = '$title', content='$content',image='$image'
   WHERE farmerID=$id;
";
}
else
{
 $sql="UPDATE farmer SET title = '$title', content='$content'
   WHERE farmerID=$id;
";
}
$result=mysql_query($sql);

     echo mysql_error();
mysql_close($conn);
echo "更新成功<br>";
?>
<input type="button" value="返回" onClick="javascript:location.href='back-farmer.php'">
</body>