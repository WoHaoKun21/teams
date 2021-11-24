<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	include("conn.php");
	$reply2 = @$_POST['reply2'];
	$messageId = @$_POST['messageId'];
	// echo $reply2;
	// echo $messageId;
	// 接受发送过来的内容
	$num=mysql_query("update messagelz set reply2='$reply2' where messageId='$messageId'");
	if($num){
		echo '{"status":"10001","msg":"回复留言成功"}';
	}else{
		echo '{"status":"20001","msg":"回复留言失败，请联系管理员"}';
	}
}else{
	header("location:error.html");
}
?>