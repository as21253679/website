<script language="javascript">
function url()
{
	window.location.assign("back.php");
}
</script>

<?php
     $dbhost = 'localhost';
     $dbuser = 'admin';
     $dbpass = 'admin';
     $dbname = 'test';
     $enableid = $_POST['enable'];
	     
$conn = mysql_connect($dbhost, $dbuser, $dbpass) ;//連接資料庫
 mysql_query("SET NAMES UTF8");//設定語系
  mysql_select_db($dbname);

 $sql = "UPDATE news SET enable = '啟用中' WHERE postID=$enableid;";//查詢整個表單
  mysql_query($sql);
    // echo mysql_error();
mysql_close($conn);
$url="<script type=text/javascript>url();</script>";
	echo "$url";

?>