<?php
	ini_set('display_errors',1);
    require_once('Linebot_DB.php');
    require_once('line-bot-api/php/line-bot.php');

    $accessToken = "vF8xGUCn6fAi9hSd9aeTKNMKk55jZUydm0eUul+qi9D4EdpuEtO5cIdIEyEU1mTfKV1Bi1cKOCo+Mj56+jzM8phjzopKKGuKvd+33oXaSYI6UgGH6fGSkYzx4CpnTlWd06TjQzVYsWbQU1cvixnMNgdB04t89/1O/w1cDnyilFU=";
    $channelSecret = "02507cc2576972f641459e2e782cd4f4";
    $userId = "U0124561918e4f1add9a520ee5d2129af";

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