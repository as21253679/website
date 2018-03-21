<?php
     $dbhost = 'localhost';
     $dbuser = 'admin';
     $dbpass = 'admin';
     $dbname = 'test';

     $pid=$_GET['personid'];
	 $mid=$_GET['marketid'];
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">   
</head>
<body>
<script language="javascript">
function url()
{
    var mid ="<?php echo $mid?>";
	window.location.assign("back-farmer-join_create.php?A="+ mid +"");
}
</script>

<?php
$conn = mysql_connect($dbhost, $dbuser, $dbpass) ;//連接資料庫
 mysql_query("SET NAMES UTF8");//設定語系
  mysql_select_db($dbname);

    $sql="SELECT id FROM farm_farmer where marketid=$mid and personid=$pid";

$result=mysql_query($sql);
$values = mysql_fetch_array($result);
if($values!='')
{
 $sql="delete from farm_farmer where marketid=$mid and personid=$pid;";

$result=mysql_query($sql);
}
     echo mysql_error();
mysql_close($conn);

?>
<script type=text/javascript>url();</script>
</body>