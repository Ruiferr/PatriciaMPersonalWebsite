<?php
	include('config.php');

	$sqlkey = "SELECT * FROM api_key LIMIT 1";
	$result = mysqli_query($connection, $sqlkey);
	$rowapikey = mysqli_fetch_assoc($result);

	$json = json_encode($rowapikey['fb_api_key']);
   	echo $json;
?>