<?php
	require('db.php');
	$strsql=$_REQUEST['sql'];
	// 执行sql查询
	$result=mysql_db_query($mysql_database, $strsql, $conn);
	$users=array();
	$i=0;
	while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
		$users[$i]=$row;
		$i++;
	}
	echo json_encode($users);
?>