<script language="javascript">
function url()
{
	window.location.assign("back-attractions.php");
}
</script>

<?php
     $dbhost = 'localhost';
     $dbuser = 'admin';
     $dbpass = 'admin';
     $dbname = 'test';
     $disableid = $_POST['disable'];
	     
$conn = mysql_connect($dbhost, $dbuser, $dbpass) ;//連接資料庫
 mysql_query("SET NAMES UTF8");//設定語系
  mysql_select_db($dbname);

 $sql = "UPDATE post SET enable = '停用中' WHERE postID=$disableid;";//查詢整個表單
  mysql_query($sql);
    // echo mysql_error();
mysql_close($conn);
$url="<script type=text/javascript>url();</script>";
	echo "$url";

?>