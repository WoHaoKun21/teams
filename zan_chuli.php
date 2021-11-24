<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		include("conn.php");
		$messageId = @$_POST['messageId'];
		$rs=mysql_query("update messagelz set zan=zan+1 where messageId='$messageId'");
		if($rs>0){
			$sel=mysql_query("select * from messagelz where messageId='$messageId'");
			$num=mysql_num_rows($sel);
			if($num){
				while($info=mysql_fetch_assoc($sel)){
					$inf=json_encode($info);
				}
				$json='{"status":"10001","msg":"success","data":'.$inf.'}';
				echo $json;
			}
		}
	}else{
		header("location:error.php");
	}
?>