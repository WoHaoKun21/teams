<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	include("conn.php");
	$reply = @$_POST['reply'];
	$messageId = @$_POST['messageId'];
	// 发送SQL语句
	$num = mysql_query($conn,"update message set reply='$reply' where messageId='$messageId'");
	if($num){
		echo '{"status":"10001","msg":"回复成功"}';
	}else{
		echo '{"status":"20001","msg":"回复失败，请维修"}';
	}
	mysql_close($conn);
}else{
	header("location:error.php");
}
?>