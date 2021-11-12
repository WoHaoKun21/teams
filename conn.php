<?php
$conn=@mysql_connect("localhost","root","") or die("db connect error!");
mysql_select_db("leave_message69_lz",$conn);
mysql_query("set names utf8");
?>