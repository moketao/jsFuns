<?php
	$request_body = $_REQUEST["data"];
	$path = "data.json";
	file_put_contents($path, $request_body);
	echo "ok";
?>