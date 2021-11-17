<?php
header("content-type:text/html;charset=utf-8");
// 连接数据库服务器
$conn = mysql_connect("localhost","root","") or die ("数据库服务器未连接");
// 切换数据库
mysql_select_db("teams",$conn);
// 支持中文
mysql_query("set names utf8");
?>