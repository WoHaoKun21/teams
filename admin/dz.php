<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$messageId = @$_GET['messageId'];
	$zan = @$_GET['dzl'];
	include("conn.php");
	// 发送sql语句
	$num = mysql_query("update messagelz set zan='$zan'+1 where messageId='$messageId'");
	$dz = mysql_query("select zan form messagelz where messageId='$messageId'");
							// select dz from message where messageId=1;
	if($num){
		echo '{"status":"10001","msg":"点赞成功","dz":'.($zan+1).'}';
	}else{
		echo '{"status":"20001","msg":"点赞失败请联系管理员"}';
	}
	// 关闭数据库
	mysql_close($conn);
}else{
	header("location:../error.html");
}
?>