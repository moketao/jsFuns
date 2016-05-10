<?php
    $mysql_server_name=""; //数据库服务器名称
    $mysql_username=""; // 连接数据库用户名
    $mysql_password=""; // 连接数据库密码
    $mysql_database=""; // 数据库的名字
    
    // 连接到数据库
    $conn=mysql_connect($mysql_server_name, $mysql_username,$mysql_password) or die("connect failed" . mysql_error());
	// 从表中提取信息的sql语句
    mysql_query("set names 'utf8'");
?>