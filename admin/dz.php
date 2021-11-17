<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$messageId = @$_GET['messageId'];
	$dzl = @$_GET['dzl'];
	include("conn.php");
	// 发送sql语句
	$num = mysql_query("update message set dz='$dzl'+1 where messageId='$messageId'");
	$dz = mysql_query("select dz form message where messageId='$messageId'");
							// select dz from message where messageId=1;
	if($num){
		echo '{"status":"10001","msg":"点赞成功","dz":'.($dzl+1).'}';
	}else{
		echo '{"status":"20001","msg":"点赞失败请联系管理员"}';
	}
	// 关闭数据库
	mysql_close($conn);
}else{
	header("location:error.html");
}
?>