<?php
	$appID = isset($_GET['appid']) ? $_GET['appid'] : 730;
	
	$file = 'apps/' . $appID . '/app_version.php';
	
	if (file_exists($file))
	{
		require_once('apps/' . $appID . '/app_version.php');
	}
	else
	{
		die('0');
	}
	
	$info = new \App();
	
	echo $info->returnVersion();
?>