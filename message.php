<?php
// 首页显示留言接口
header("content-type:text/html;charset=utf-8");
if($_SERVER['REQUEST_METHOD']=="POST"){
   $page=$_POST['page'];
   include("conn.php");
   $rs=mysql_query('select * from messagelz where sh=1 order by addTime desc limit '.(($page-1)*5).',5');
   
   $json='{"status":"10001","msg":"success","data":[';
   $num=mysql_num_rows($rs);
   if($num>0){
      while($info=mysql_fetch_assoc($rs)){
	    $json.=json_encode($info).",";  
       }
	   echo substr($json,0,strlen($json)-1)."]}";
    }else{
	   echo '{"status":"10002","msg":"没有记录"}';
	   }	
	
}else{
	header("location:error.html");
}
?>