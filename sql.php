<?php
	require('db.php');
	$strsql="SELECT * FROM `mybill` WHERE id >= 20 AND  id <= 29 LIMIT 0, 5";
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