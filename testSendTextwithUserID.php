<?php

    ini_set('display_errors',1);
    require_once('Linebot_DB.php');
    require_once('line-bot-api/php/line-bot.php');

    $accessToken = "";
    $channelSecret = "";
    $userId = "";

    $bot2 = new BOT_API($channelSecret,$accessToken);


    ////////////////////////////////// SEND TEXT TO ALL USER IN DATABASE ///////////////////////////////


    $listUser = getUser();
    $objmessage = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder("Hello by Ironfist !!!");

    var_dump($listUser);

    foreach ($listUser as $val) {   ///$val = userID in DATABASE
    	$bot2->pushMessage($val,$objmessage);
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////

?>