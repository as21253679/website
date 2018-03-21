<HTML>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>圖片檔案上傳</title>
</head><BODY><H3>圖檔存入相關資訊：<HR></H3>

<?php
	//mysql_query("SET NAMES UTF8");//設定語系
      echo "<BLOCKQUOTE>";
      echo "檔案名稱：" . $_FILES["upfile"]['name'] . "<BR>";
      echo "檔案大小：" . ($_FILES["upfile"]['size']/1024) . "Kb<BR>";
      echo "檔案類型：" . $_FILES["upfile"]["type"] . "<BR>";
      echo "暫存檔名：" . $_FILES["upfile"]["tmp_name"] . "<BR>";
      if ( $_FILES["upfile"]["error"] > 0 ) 
	{
	echo "上傳失敗!<br>";
	}
	else
        {
	$filed = $_FILES['upfile']['name'];
	move_uploaded_file($_FILES['upfile']['tmp_name'],"image/".iconv('utf-8','big5', $filed));   // 搬移上傳檔案 可中文
	echo "上傳成功!<br>";
}         
?>
	<img src="image/<?php echo $_FILES["upfile"]['name']?>" style="width:500px;">
<HR></BODY></HTML>