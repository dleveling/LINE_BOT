<?php

	ini_set('display_errors',1);
    require_once('Linebot_DB.php');
    require_once('line-bot-api/php/line-bot.php');

    $accessToken = "vF8xGUCn6fAi9hSd9aeTKNMKk55jZUydm0eUul+qi9D4EdpuEtO5cIdIEyEU1mTfKV1Bi1cKOCo+Mj56+jzM8phjzopKKGuKvd+33oXaSYI6UgGH6fGSkYzx4CpnTlWd06TjQzVYsWbQU1cvixnMNgdB04t89/1O/w1cDnyilFU=";
    $channelSecret = "02507cc2576972f641459e2e782cd4f4";
    $userId = "U0124561918e4f1add9a520ee5d2129af";

    $bot2 = new BOT_API($channelSecret,$accessToken);

     /*$outputText = new LINE\LINEBot\MessageBuilder\TextMessageBuilder("Inserted");
    $bot->pushMessage($userId,$outputText);
    exit();*/
    
    //////  replyMessageNew = NO USE OBJECT    
    //////  replyMessage = USE OBJECT    

    /////////////////////////////////////////////////////////////////*** Add User ID & Name TO DATABASE ***///////////////////////////////////////////////////////////

    if($bot2->message->text == "add"){

        $response = $bot2->getProfile($bot2->source->userId);

        if ($response->isSucceeded()) {
            $profile = $response->getJSONDecodedBody();
            $usNAME = $profile['displayName'];
            insertUser($bot2->source->userId,$usNAME);

            $response = $bot2->replyMessageNew($bot2->replyToken,$bot2->source->userId." & ".$usNAME);
        }  
    }

     /////////////////////////////////////////////////////////////////*** UPDATE User Name TO DATABASE ***///////////////////////////////////////////////////////////

     if($bot2->message->text == "update"){

        $response = $bot2->getProfile($bot2->source->userId);

        if ($response->isSucceeded()) {
            $profile = $response->getJSONDecodedBody();
            $usNAME = $profile['displayName'];
            updateUser($bot2->source->userId,$usNAME);

            $response = $bot2->replyMessageNew("UPDATED !");
        }  
    }

    /////////////////////////////////////////////////////////////////*** Carousal Template ***/////////////////////////////////////////////////////////////////////////

    if($bot2->message->text == "cas"){

    $action[] = new \LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder("Add","add");
    $action[] = new \LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder("Carousal Template","cas");
    $link_ing =  "https://grean.000webhostapp.com/IMG_DL_LINE_BOT/ironfist.jpg";
    $action_template = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilder("IronFist","Hello IronFist",$link_ing,$action);


    $alltmplate[] =  $action_template;


    $action2[] = new \LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder("Greating","Greating EiEi");
    $action2[] = new \LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder("Google",'https://www.google.com');
    $link_ing2 =  "https://static.independent.co.uk/s3fs-public/thumbnails/image/2015/05/01/10/maxresdefault.jpg";
    $action_template2 = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilder("DareDevil","Hello DareDevil",$link_ing2,$action2);

   
    $alltmplate[] =  $action_template2;

    $action3[] = new \LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder("Greating","Greating EiEi");
    $action3[] = new \LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder("Google",'https://www.google.com');
    $link_ing2 =  "https://static.independent.co.uk/s3fs-public/thumbnails/image/2015/05/01/10/maxresdefault.jpg";
    $action_template3 = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilder("DareDevil","Hello DareDevil",$link_ing2,$action3);

   
    $alltmplate[] =  $action_template3;


    $action_template4 = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder($alltmplate);

    $templt3 = new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder("Alttexttt",$action_template4);
   

    //$bot2->pushMessage($userId,$templt3);

    $response = $bot2->replyMessage($bot2->replyToken,$templt3);

    }

    ////////////////////////////////////////////////////////// SEND TEXT TO ALL USER IN DATABASE //////////////////////////////////////////////////////////////////////


    if($bot2->message->text == "textall"){

        $listUser = getUser();
        $objmessage = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder("Hello by Ironfist !!!");

        var_dump($listUser);

        foreach ($listUser as $val) {   ///$val = userID in DATABASE
            $bot2->pushMessage($val,$objmessage);
        }

    }

    /////////////////////////////////////////////////////////// SEND USERID TO MYLINK.PHP ////////////////////////////////////////////////////////////////////////////

    if($bot2->message->text == "mylink"){

        $action[] = new \LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder("Hello","mylink");
        $action[] = new \LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder("Mylink",'https://grean.000webhostapp.com/mylink.php?userID='.$bot2->source->userId);
        $link_ing =  "https://grean.000webhostapp.com/IMG_DL_LINE_BOT/ironfist.jpg";
        $action_template = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder("Mylink","Hello Mylink",$link_ing,$action);

        $templt = new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder("Alttexttt",$action_template);

        $bot2->pushMessage($bot2->source->userId,$templt);

    }

    ////////////////////////////////////////////////////////////    BUTTON TEMPLATE   ////////////////////////////////////////////////////////////////////////////////

    if($bot2->message->text == "btntmp"){

        $action[] = new \LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder("Hello","EiEi");
        $action[] = new \LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder("Google",'https://www.google.com');
        $link_ing =  "https://grean.000webhostapp.com/IMG_DL_LINE_BOT/ironfist.jpg";
        $action_template = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder("ButtonTest","Hello BTN",$link_ing,$action);

        $templt = new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder("Alttexttt",$action_template);

        $bot2->pushMessage($userId,$templt);

     }

     /////////////////////////////////////////////////////////// MultiMessageBuilder ///////////////////////////////////////////////////////////////////////////////

     if($bot2->message->text == "multimes"){

        $message = "Type : Text. ";
        $MultiMessage = new \LINE\LINEBot\MessageBuilder\MultiMessageBuilder();
        $Text = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
        $MultiMessage->add($Text);
        $Text2 = new LINE\LINEBot\MessageBuilder\StickerMessageBuilder(11538,51626499);
        $MultiMessage->add($Text2);

        $bot2->replyMessage($bot2->replyToken,$MultiMessage);
    
    }


    /////////////////////////////////////////////////////////// SEND LOCATION BACK ///////////////////////////////////////////////////////////////////////////////

    if ($bot2->isLocation == true){

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

    /////////////////////////////////////////////////////////// GET USER PROFILE IMG AND SEND BACK ////////////////////////////////////////////////////////////////

    if($bot2->message->text == "pf"){

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

	}

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>
