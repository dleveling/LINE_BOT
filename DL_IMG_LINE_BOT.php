<?php
	
	include_once('line-bot-api-master/php/line-bot.php');
	$access_token = "vF8xGUCn6fAi9hSd9aeTKNMKk55jZUydm0eUul+qi9D4EdpuEtO5cIdIEyEU1mTfKV1Bi1cKOCo+Mj56+jzM8phjzopKKGuKvd+33oXaSYI6UgGH6fGSkYzx4CpnTlWd06TjQzVYsWbQU1cvixnMNgdB04t89/1O/w1cDnyilFU=Issue";
	$channelSecret = '02507cc2576972f641459e2e782cd4f4';

	$bot = new BOT_API($channelSecret, $access_token);

	$messageId='007';
	$response = $bot->getMessageContent($messageId);
	if($response->isSucceeded()){
		$tmpfile = tmpfile();
		$output = "IMG_DL_LINE_BOT/".$messageId .'.jpg';
		file_put_contents($output, $response->getRawbody());
	}else{
		error_log($response->getHTTPStatus().'  '.$response->getRawbody());
	}	
		exit;


?>