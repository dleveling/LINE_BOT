<?php 

    
    ini_set('display_errors',1);

    echo "AAA";
    require_once('line-bot-api/php/vendor/autoload.php');


    $accessToken = "vF8xGUCn6fAi9hSd9aeTKNMKk55jZUydm0eUul+qi9D4EdpuEtO5cIdIEyEU1mTfKV1Bi1cKOCo+Mj56+jzM8phjzopKKGuKvd+33oXaSYI6UgGH6fGSkYzx4CpnTlWd06TjQzVYsWbQU1cvixnMNgdB04t89/1O/w1cDnyilFU=
Issue";
    $channelSecret = '02507cc2576972f641459e2e782cd4f4';
    $userID = "U0124561918e4f1add9a520ee5d2129af";

    $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($accessToken);
    $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret ]);    
    
    $message = "สวัสดี";
    $outputText = new LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
    
    $response = $bot->getMessageContent($userID,$outputText);
  
    echo $response-> getHTTPStatus();
?>