<?php
header("content-type:text/html;charset=utf-8");
// 连接数据库服务器
$conn = mysqli_connect("localhost","root","") or die ("数据库服务器未连接");
// 切换数据库
mysqli_select_db($conn,"teams");
// 支持中文
mysqli_query($conn,"set names utf8");
?>