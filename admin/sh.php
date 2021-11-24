<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
	include("conn.php");
	$messageId = @$_GET['messageId'];
	// 发送SQL语句
	$num = mysql_query("update messagelz set sh=1 where messageId='$messageId'");
	if($num){
		// 输出JSON
		echo '{"status":"10001","msg":"审核留言成功","sh":"已审核"}';
	}else{
		echo '{"status":"20001","msg":"审核失败，请联系管理员"};';
	}
	mysql_close($conn);// 关闭数据库服务器
}else{
	header("location:../error.html");
}
?>