<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	include("conn.php");
	$author = @$_POST['author'];
	$face = @$_POST['face'];
	$title = @$_POST['title'];
	$content = @$_POST['content'];
	$num = mysql_query("insert into messagelz(author,title,content,face,addTime) values('$author','$title','$content','$face',now())");
	if($num){
		echo '{"status":"10001","msg":"留言发布成功,等待管理员审核","author":"'.$author.$face.$title.$content.'"}';
	}else{
		echo '{"status":"20001","msg":"留言发布失败，请联系管理员"}';
	}
	mysql_close($conn);
}else{
	header("location:../error.html");
}
?>