<?php

    ini_set('display_errors',1);
    require_once('Linebot_DB.php');
    require_once('line-bot-api/php/line-bot.php');


    $accessToken = "vF8xGUCn6fAi9hSd9aeTKNMKk55jZUydm0eUul+qi9D4EdpuEtO5cIdIEyEU1mTfKV1Bi1cKOCo+Mj56+jzM8phjzopKKGuKvd+33oXaSYI6UgGH6fGSkYzx4CpnTlWd06TjQzVYsWbQU1cvixnMNgdB04t89/1O/w1cDnyilFU=";
    $channelSecret = "02507cc2576972f641459e2e782cd4f4";
    $userId = "U0124561918e4f1add9a520ee5d2129af";

    $bot2 = new BOT_API($channelSecret,$accessToken);


    //$message = "Hello New Bot";
    //$Text = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
    //$bot2->pushMessage($userId,$Text);


    //https://developers.line.me/media/messaging-api/sticker_list.pdf
    //$sticker = new LINE\LINEBot\MessageBuilder\StickerMessageBuilder(1,20);
    //$bot2->pushMessage($userId,$sticker);

    //$bot2->replyMessage($bot2->replyToken,$sticker);



    ////////////////////////////// BUTTON TEMPLATE //////////////////////////////

        $action[] = new \LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder("Hello","EiEi");
        $action[] = new \LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder("Google",'https://www.google.com');
        $link_ing =  "https://grean.000webhostapp.com/IMG_DL_LINE_BOT/ironfist.jpg";
        $action_template = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder("ButtonTest","Hello BTN",$link_ing,$action);

        $templt = new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder("Alttexttt",$action_template);

        $bot2->pushMessage($userId,$templt);

    ////////////////////////////////////////////////////////////////////////////

    if($bot2->isText){

        $message = "Type : Text. ";
        $MultiMessage = new \LINE\LINEBot\MessageBuilder\MultiMessageBuilder();
        $Text = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
        $MultiMessage->add($Text);
        $Text2 = new LINE\LINEBot\MessageBuilder\StickerMessageBuilder(11538,51626499);
        $MultiMessage->add($Text2);

        $bot2->replyMessage($bot2->replyToken,$MultiMessage);
    
    }


    else if ($bot2->isLocation == true){

        $title = $bot2->message->title;
        $address = $bot2->message->address;
        $latitude = $bot2->message->latitude;
        $longitude = $bot2->message->longitude;

        if (!$title) {
            $title = "Unknown Location";
        }

        $Text = new \LINE\LINEBot\MessageBuilder\LocationMessageBuilder($title,$address,$latitude,$longitude);

        $bot2->replyMessage($bot2->replyToken,$Text);

    }




?>