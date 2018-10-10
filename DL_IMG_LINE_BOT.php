<?php
	
	include_once('line-bot-api-master/php/line-bot.php');
	$access_token = "";
	$channelSecret = '';

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