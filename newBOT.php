<?php 

    
    ini_set('display_errors',1);

    echo "AAA";
    require_once('line-bot-api/php/vendor/autoload.php');


    $accessToken = "";
    $channelSecret = '';
    $userID = "";

    $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($accessToken);
    $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret ]);    
    
    $message = "สวัสดี";
    $outputText = new LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
    
    $response = $bot->getMessageContent($userID,$outputText);
  
    echo $response-> getHTTPStatus();
?>