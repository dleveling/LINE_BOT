    <?php

    ini_set('display_errors',1);
    
    //require_once('line-bot-api/php/vendor/autoload.php');

    require_once('line-bot-api/php/line-bot.php');

    $accessToken = "";
    $channelSecret = "";
    $userId = "";

    /*$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($accessToken);
    $bot = new \LINE\LINEBot($httpClient, ['channelSecret' =>  $channelSecret ]);*/

    $bot2 = new BOT_API($channelSecret,$accessToken);

    //$bot2->replyMessageNew($bot2->replyToken,$bot2->text);

    /*$content = file_get_contents('php://input');
    $arrayJSON = json_decode($content,true);
    $replyToken = $arrayJSON['events'][0]['replyToken'];
    $message3 = $arrayJSON['events'][0]['message']['text'];

    $bot2->replyMessageNew($replyToken,$message3);

    $message = "สวัสดีคุณ";
    $message2 = "Hello";

    $bot2->sendMessageNew($userId,$message);

    $outputText = new LINE\LINEBot\MessageBuilder\TextMessageBuilder($message2);

    $response = $bot->pushMessage($userId,$outputText);

    echo $response->getHTTPStatus();
    echo json_encode($response->getJSONDecodedBody());

    $sticker = new LINE\LINEBot\MessageBuilder\StickerMessageBuilder(1,6);

    $response = $bot->replyMessage($replyToken,$sticker);*/



    $response = $bot2->getProfile($bot2->source->userId);

    if ($response->isSucceeded()) {
        $profile = $response->getJSONDecodedBody();
        echo $profile['displayName'];
        echo $profile['pictureUrl'];
        echo $profile['statusMessage'];

        //SAVE IMAGE
        $picURL = $profile['pictureUrl'];
        $content = file_get_contents($picURL);
        file_put_contents("IMG_DL_LINE_BOT/".$bot2->source->userId.'.jpg',$content);
        //////////////

        $imgshow = "https://grean.000webhostapp.com/IMG_DL_LINE_BOT/".$bot2->source->userId.".jpg";
        
        echo $imgshow;

        $imgbuld = new LINE\LINEBot\MessageBuilder\ImageMessageBuilder($imgshow,$imgshow);

        $bot2->replyMessage($bot2->replyToken,$imgbuld);



        
        //$bot2->replyMessageNew($bot2->replyToken,$profile['displayName']);
        //$bot2->replyMessageNew($bot2->replyToken,$profile['pictureUrl']);
        //$bot2->replyMessageNew($bot2->replyToken,$profile['statusMessage']);


    }



?>
