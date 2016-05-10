<?php
	$url=$_REQUEST['url'];
	$html=file_get_contents($url);
	echo($html);
?>