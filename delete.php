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
     $deleteid = $_POST['delete'];
	     
$conn = mysql_connect($dbhost, $dbuser, $dbpass) ;//連接資料庫
 mysql_query("SET NAMES UTF8");//設定語系
  mysql_select_db($dbname);

 $sql = "DELETE FROM post WHERE postID=$deleteid;";
  mysql_query($sql);
    // echo mysql_error();
mysql_close($conn);
$url="<script type=text/javascript>url();</script>";
	echo "$url";

?>