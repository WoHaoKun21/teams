<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	include("conn.php");
	$rs = mysql_query("select * from message");
	$num = mysql_num_rows($rs);
	echo $num;
	mysql_close($conn);
}else{
	header("location:error.php");
}
?>