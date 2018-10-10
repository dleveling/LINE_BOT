<?php
    
    include_once('line-bot-api-master/php/line-bot.php');
    
    $accessToken = "
Issue";//copy Channel access token ตอนที่ตั้งค่ามาใส่
    $channelSecret = '';
    
    $bot = new BOT_API($channelSecret, $accessToken);
    
    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";
    
    //รับข้อความจากผู้ใช้
    $type_message = $arrayJson['events'][0]['message']['type'];
#ตัวอย่าง Message Type "Text"

if ($type_message == 'text') {
    
    $message = $arrayJson['events'][0]['message']['text'];
    
    if($message == "สวัสดี"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "สวัสดีจ้าาา";
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Sticker"
    else if($message == "ฝันดี"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "sticker";
        $arrayPostData['messages'][0]['packageId'] = "2";
        $arrayPostData['messages'][0]['stickerId'] = "46";
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Image"
    else if($message == "รูปน้องแมว"){
        $image_url = "https://i.pinimg.com/originals/cc/22/d1/cc22d10d9096e70fe3dbe3be2630182b.jpg";
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Location"
    else if($message == "พิกัดสยามพารากอน"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "location";
        $arrayPostData['messages'][0]['title'] = "สยามพารากอน";
        $arrayPostData['messages'][0]['address'] =   "13.7465354,100.532752";
        $arrayPostData['messages'][0]['latitude'] = "13.7465354";
        $arrayPostData['messages'][0]['longitude'] = "100.532752";
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Text + Sticker ใน 1 ครั้ง"
    else if($message == "ลาก่อน"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "บายย";
        $arrayPostData['messages'][1]['type'] = "sticker";
        $arrayPostData['messages'][1]['packageId'] = "2";
        $arrayPostData['messages'][1]['stickerId'] = "502";
        replyMsg($arrayHeader,$arrayPostData);
    }

    else if ($message == "รูป") {
        $image_url = "https://grean.000webhostapp.com/IMG_DL_LINE_BOT/";

        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "imagemap";
        $arrayPostData['messages'][0]['baseUrl'] = 'https://grean.000webhostapp.com/IMG_DL_LINE_BOT/' ;
        $arrayPostData['messages'][0]['altText'] = "This is an imagemap";
        $arrayPostData['messages'][0]['baseSize']['height'] = 700;
        $arrayPostData['messages'][0]['baseSize']['width'] = 700;

        $arrayPostData['messages'][0]['actions'][0]['type'] = "uri";
        $arrayPostData['messages'][0]['actions'][0]['linkUri'] = "https://www.droidsans.com/";
        $arrayPostData['messages'][0]['actions'][0]['area']['x'] = 0;
        $arrayPostData['messages'][0]['actions'][0]['area']['y'] = 0;
        $arrayPostData['messages'][0]['actions'][0]['area']['width'] = 700;
        $arrayPostData['messages'][0]['actions'][0]['area']['height'] = 700;
       

       /*$arrayPostData2['replyToken'] = $arrayJson['events'][0]['replyToken'];

       $tmp = array(
        'replyToken' => $arrayJson['events'][0]['replyToken'],
        'messages' => array(
            array(
                'type' => 'imagemap', // 訊息類型 (圖片地圖)
                'baseUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example', // 圖片網址 (可調整大小 240px, 300px, 460px, 700px, 1040px)
                'altText' => 'Example imagemap', // 替代文字
                'baseSize' => array(
                    'height' => 1040, // 圖片寬
                    'width' => 1040 // 圖片高
                ),
                'actions' => array(
                    array(
                        'type' => 'uri', // 類型 (網址)
                        'linkUri' => 'https://www.google.com', // 連結網址
                        'area' => array(
                            'x' => 0, // 點擊位置 X 軸
                            'y' => 0, // 點擊位置 Y 軸
                            'width' => 520, // 點擊範圍寬度
                            'height' => 1040 // 點擊範圍高度
                        )
                    ),
                    array(
                        'type' => 'message', // 類型 (用戶發送訊息)
                        'text' => 'Hello', // 發送訊息
                        'area' => array(
                            'x' => 520, // 點擊位置 X 軸
                            'y' => 0, // 點擊位置 Y 軸
                            'width' => 520, // 點擊範圍寬度
                            'height' => 1040 // 點擊範圍高度
                        )
                    )
                )
            )
        ));

       $arrayPostData2['messages'][0]['type'] = "text";
       $arrayPostData2['messages'][0]['text'] = json_encode($tmp);*/

        replyMsg($arrayHeader,$arrayPostData);
    }









}else if ($type_message == 'sticker') {
        

        $message = $arrayJson['events'][0]['message']['packageId'];
        $message2 = $arrayJson['events'][0]['message']['stickerId'];


        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Package ID : ".$message;
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "Sticker ID : ".$message2;
        replyMsg($arrayHeader,$arrayPostData);

}else if ($type_message == 'image') {

        $message = $arrayJson['events'][0]['message']['id'];
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Img ID : ".$message;
        //replyMsg($arrayHeader,$arrayPostData);

        $messageId=$message;
        $response = $bot->getMessageContent($messageId);
        if($response->isSucceeded()){
        $tmpfile = tmpfile();
        $output = "IMG_DL_LINE_BOT/".$messageId .'.jpg';
        file_put_contents($output, $response->getRawbody());
        }else{
            error_log($response->getHTTPStatus().'  '.$response->getRawbody());
        } 

        $image_url = "https://grean.000webhostapp.com/IMG_DL_LINE_BOT/".$message.".jpg";
        $arrayPostData['messages'][1]['type'] = "image";
        $arrayPostData['messages'][1]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][1]['previewImageUrl'] = $image_url;
        replyMsg($arrayHeader,$arrayPostData);  
}





else{
        $image_url = "https://vignette.wikia.nocookie.net/villains/images/2/2b/Jerrythemouse.jpg/revision/latest?cb=20170721111021";
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
        replyMsg($arrayHeader,$arrayPostData);     
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