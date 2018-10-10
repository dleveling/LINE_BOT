<?php 

    include_once('line-bot-api-master/php/line-bot.php');
    
    $accessToken = "";//copy Channel access token ตอนที่ตั้งค่ามาใส่
    $channelSecret = '';
    
    $bot = new BOT_API($channelSecret, $accessToken);
    
    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";
    
    //รับข้อความจากผู้ใช้
    $type_message = $arrayJson['events'][0]['message']['type'];

     
    $messageUID = "";


    $arrayPostData['to'] = $messageUID;
    /*arrayPostData['messages'][0]['type'] = "text";
    $arrayPostData['messages'][0]['text'] = "สวัสดีโทเคน";

    $image_url = "https://vignette.wikia.nocookie.net/villains/images/2/2b/Jerrythemouse.jpg/revision/latest?cb=20170721111021";
    $arrayPostData['messages'][1]['type'] = "image";
    $arrayPostData['messages'][1]['originalContentUrl'] = $image_url;
    $arrayPostData['messages'][1]['previewImageUrl'] = $image_url;

    $image_url = "https://grean.000webhostapp.com/IMG_DL_LINE_BOT/";

    $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
    $arrayPostData['messages'][2]['type'] = "imagemap";
    $arrayPostData['messages'][2]['baseUrl'] = 'https://grean.000webhostapp.com/IMG_DL_LINE_BOT/' ;
    $arrayPostData['messages'][2]['altText'] = "This is an imagemap";
    $arrayPostData['messages'][2]['baseSize']['height'] = 700;
    $arrayPostData['messages'][2]['baseSize']['width'] = 700;

    $arrayPostData['messages'][2]['actions'][0]['type'] = "uri";
    $arrayPostData['messages'][2]['actions'][0]['linkUri'] = "https://www.droidsans.com/";
    $arrayPostData['messages'][2]['actions'][0]['area']['x'] = 0;
    $arrayPostData['messages'][2]['actions'][0]['area']['y'] = 0;
    $arrayPostData['messages'][2]['actions'][0]['area']['width'] = 700;
    $arrayPostData['messages'][2]['actions'][0]['area']['height'] = 700;


    //Yes No Template

    $arrayPostData['messages'][3]['type'] = "template";
    $arrayPostData['messages'][3]['altText'] = "this is a confirm template";
    $arrayPostData['messages'][3]['template']['type'] = "confirm";
    $arrayPostData['messages'][3]['template']['text'] = "Wanna join The Avengers ?";

    $arrayPostData['messages'][3]['template']['actions'][0]['type'] = "message";
    $arrayPostData['messages'][3]['template']['actions'][0]['label'] = "Yes";
    $arrayPostData['messages'][3]['template']['actions'][0]['text'] = "yes";

    $arrayPostData['messages'][3]['template']['actions'][1]['type'] = "message";
    $arrayPostData['messages'][3]['template']['actions'][1]['label'] = "No";
    $arrayPostData['messages'][3]['template']['actions'][1]['text'] = "no";*/

    //Buttons Template
    $arrayPostData['messages'][0]['type'] = "template";
    $arrayPostData['messages'][0]['altText'] = "This is a buttons template";
    $arrayPostData['messages'][0]['template']['type'] = "buttons";
    $arrayPostData['messages'][0]['template']['thumbnailImageUrl'] = "https://grean.000webhostapp.com/IMG_DL_LINE_BOT/ironfist.jpg";
    $arrayPostData['messages'][0]['template']['imageAspectRatio'] = "rectangle";
    $arrayPostData['messages'][0]['template']['imageSize'] = "cover";
    $arrayPostData['messages'][0]['template']['imageBackgroundColor'] = "#FFFFFF";
    $arrayPostData['messages'][0]['template']['title'] = "Menu";
    $arrayPostData['messages'][0]['template']['text'] = "Please select";
    $arrayPostData['messages'][0]['template']['defaultAction']['type'] = "uri";
    $arrayPostData['messages'][0]['template']['defaultAction']['label'] = "View detail";
    $arrayPostData['messages'][0]['template']['defaultAction']['uri'] = "https://www.google.com";

    $arrayPostData['messages'][0]['template']['actions'][0]['type'] = "uri";
    $arrayPostData['messages'][0]['template']['actions'][0]['label'] = "Apple";
    $arrayPostData['messages'][0]['template']['actions'][0]['uri'] = "https://www.apple.com";

    $arrayPostData['messages'][0]['template']['actions'][1]['type'] = "uri";
    $arrayPostData['messages'][0]['template']['actions'][1]['label'] = "Samsung";
    $arrayPostData['messages'][0]['template']['actions'][1]['uri'] = "https://www.samsung.com";

    $arrayPostData['messages'][0]['template']['actions'][2]['type'] = "uri";
    $arrayPostData['messages'][0]['template']['actions'][2]['label'] = "GSMArena";
    $arrayPostData['messages'][0]['template']['actions'][2]['uri'] = "https://www.gsmarena.com";

    pushMsg($arrayHeader,$arrayPostData);



    function pushMsg($arrayHeader,$arrayPostData){
      $strUrl = "https://api.line.me/v2/bot/message/push";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$strUrl);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $result = curl_exec($ch);
      curl_close ($ch);
   }




    function replyMsg($arrayHeader,$arrayPostData){
        $strUrl = "https://api.line.me/v2/bot/message/reply";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);    
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($arrayPostData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close ($ch);
    }
   exit;

?>