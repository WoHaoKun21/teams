<?php
	header("content-type:text/html;charset=utf-8");
	if($_SERVER['REQUEST_METHOD']=='POST'){
		include("conn.php");
		$author=$_POST['author'];
		$title=$_POST['title'];
		$content=$_POST['content'];
		$face=$_POST['face'];
		$rs=mysql_query("insert into messagelz(author,title,content,face,addTime) values('$author','$title','$content','$face',now())");
		if($rs){
			echo '{"status":"10001","msg":"success"}';
		}else{
			echo '{"status":"10001","msg":"发布留言失败，请联系管理员"}';
		}
	}else{
		header("location:error.html");
	}
?>