<?php
	ini_set('display_errors',1);
    require_once('Linebot_DB.php');
    require_once('line-bot-api/php/line-bot.php');

    $accessToken = "";
    $channelSecret = "";
    $userId = "";

    $bot2 = new BOT_API($channelSecret,$accessToken);



	$userID = $_GET['userID'];

	$response = $bot2->getProfile($userID);

        if ($response->isSucceeded()) {
            $profile = $response->getJSONDecodedBody();
            $usNAME = $profile['displayName'];
            echo $usNAME." - ";
            echo $userID;

        }


?>

<html>
	<body>

	</body>
</html>