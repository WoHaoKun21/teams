<?php
// 申明文档格式
header("content-type:text/html;charset=utf-8");
$action = @$_GET['action'];
$page = @$_GET['page'];
if(empty($page)){
	$page = 1;
}
if($action == "login"){
	if($_SERVER['REQUEST_METHOD']=='POST'){
		include("conn.php");
		$result = mysql_query("select * from messagelz order by addTime desc");// 获取数据
		$num = mysql_num_rows($result);// 获取条数
		$pagenum = ceil($num/5);// 通过条例上取整获得页数
		if($page>$pagenum){// 如果当前页数大于总页数，将数值初始化
			$page = $pagenum;
		}
		mysql_data_seek($result,($page-1)*5);
		// 将条例按关联数组进行输出
		$json = '{"status":"10001","msg":"OK","page":'.$page.',"pagenum":'.$pagenum.',"data":[';
		for($i=1;$i<=5;$i++){
			if($arr = mysql_fetch_assoc($result)){
				$json.=json_encode($arr).',';
			}
		}
		echo substr($json,0,strlen($json)-1).']}';
		// 关闭结果集
		mysql_free_result($result);
		// 关闭数据库服务器
		mysql_close($conn);
	}else{
		echo '{"status":"20001","msg":"违规登录,无法获取数据"}';
	}
}else{
	echo '{"status":"20001","msg":"登录方式错误"}';
}
?>