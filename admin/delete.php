<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	include("conn.php");
	$messageId = $_GET['messageId'];
	// 发送SQL语句
	$num = mysql_query("delete from messagelz where messageId='$messageId'");
	if($num){
		echo '{"status":"10001","msg":"删除留言成功"}';
	}else{
		echo '{"status":"20001","msg":"删除留言失败，请检测"}';
	}
	// 关闭数据库
	mysql_close($conn);
}else{
	header("location:../error.html");
}
?>