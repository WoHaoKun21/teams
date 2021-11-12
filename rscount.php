<?php
header("content-type:text/html;charset=utf-8");
if($_SERVER['REQUEST_METHOD']=="POST"){
   include("conn.php");
   $rs=mysql_query('select * from messagelz where sh=1');
   $rscount=mysql_num_rows($rs);
   echo '{"status":"10001","rscount":'.$rscount.'}';
}else{
	header("location:error.php");
}
?>