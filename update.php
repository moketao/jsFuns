<?php
	require('db.php');
	$phone=$_REQUEST['phone'];
	$url=$_REQUEST['url'];
	$sys=$_REQUEST['sys'];
	mysql_query("insert into d_finance.tb_baoxian SET phone = '".$phone."' , url = '".$url."', device = '".$sys."', time = now()");
	mysql_close($conn);
	echo('ok');
?>