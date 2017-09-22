<?php
	$appID = isset($_GET['appid']) ? $_GET['appid'] : 730;
	$ip = isset($_GET['ip']) ? $_GET['ip'] : '0.0.0.0';
	$port = isset($_GET['port']) ? $_GET['port'] : 27015;
	$key = "<steamWebAPIKey>";
	
	$file = 'apps/' . $appID . '/server_version.php';
	
	if (file_exists($file))
	{
		require_once('apps/' . $appID . '/server_version.php');
	}
	else
	{
		die('0');
	}
	
	$info = new \App($ip, $port, $key);
	
	echo $info->returnVersion();
?>