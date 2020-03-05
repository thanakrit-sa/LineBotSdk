<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include 'vendor/autoload.php';



include 'bot_settings.php';

use LINE\LINEBot;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder;
use LINE\LINEBot\MessageBuilder\TemplateMessageBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ConfirmTemplateBuilder;
use LINE\LINEBot\MessageBuilder\FlexMessageBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ContainerBuilder\BubbleContainerBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ComponentBuilder\BoxComponentBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ComponentBuilder\ButtonComponentBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ComponentBuilder\TextComponentBuilder;


// ----------------------------------------------------------------------------------------------------- แบบ Template Message

$httpClient = new CurlHTTPClient(LINE_MESSAGE_ACCESS_TOKEN);
$bot = new LINEBot($httpClient, array('channelSecret' => LINE_MESSAGE_CHANNEL_SECRET));


$content = file_get_contents('php://input');
$count = 0;


$events = json_decode($content, true);


$replyToken = $events['events'][0]['replyToken'];
$typeMessage = $events['events'][0]['message']['type'];
$typeMessageImage = $events['events'][0]['image']['image'];
$userImage = $events['events'][0]['image'];
$userMessage = $events['events'][0]['message']['text'];
$userID = $events['events'][0]['source']['userId'];
$userMessage = strtolower($userMessage);
$source = explode(" ",$userMessage);
$provinc = array("star","boy","car");


if ($userMessage != null) {
    for ($i=0; $i < strlen($source); $i++) { 
        if(in_array($source[$i],$provinc) == true){
            echo "dsfngjkrshgfseklmfgs";
        }
    }
    if ($userMessage == "เรียกดูโปรโมชั่น") {
        $textReplyMessage = new BubbleContainerBuilder(
            "ltr",
            NULL,
            NULL,
            new BoxComponentBuilder(
                "horizontal",
                array(
                    new TextComponentBuilder(
                        "Copa69 สวัสดีครับ 

สนใจสมัครสมาชิกขั้นต่ำ 200 บาท รับ
โบนัส 30% จากยอดฝากครั้งแรกสูงสุด
500 บาท หรือจะเลือกรับโปรโมชั่น
สุดฮอตจากทางเว็บ เช่น

1.หูฟังบลูทูธ TRUT WIRELESS 5.0 TWS สมัคร 1000 บาท
2.พาวเวอร์แบ๊ง ELOOP E-12 สมัคร 1000 บาท
3.ลำโพง BLUETOOTH IRON MAN สมัคร 1000 บาท
4.บุหรี่ไฟฟ้า DRAG สมัคร 1000 บาท
5.โทรศัพท์จิ๋ว สมัคร 1000 บาท
6.เสื้อบอล EURO สมัคร 500 บาท
7.เสื้อฮูด Nike สมัคร 500 บาท
8.Smart Watch สมัคร 500 บาท
9.ลำโพง Bluetooth Mini สมัคร 500 บาท
10.หูฟัง Bluetooth สมัคร 500 บาท
11.ลำโพงสโมสรฟุตบอลโลก สมัคร 300 บาท
12.กระเป๋าสะพายข้างลายสโมสรฟุตบอลโลก สมัคร 300 บาท
13.Game Handle สมัคร 300 บาท
14.สมัครฝาก 200 รับโบนัส 30 %

เล่นได้ทุกอย่างในยูสเดียวบอล หวย มวย คาสิโน เกม ฝากอัตโนมัติ 30 วินาที ถอนไม่เกิน 1 นาทีทำเทิร์นเดียว 1.5 ก็สามารถถอนได้เลย ขั้นต่ำ 100 บาท

**สนใจสมัครโปรโมชั้น คลิก 'สมัครโปรโมชั่น' หรือพิมพ์ 'สมัครโปรโมชั่น'
",
                        NULL,
                        NULL,
                        "md",
                        NULL,
                        NULL,
                        true
                    )
                )
            )


        );


        $replyData = new FlexMessageBuilder("Flex", $textReplyMessage);
    } else if ($userMessage == "สมัครโปรโมชั่น") {
        $textReplyMessage = new BubbleContainerBuilder(
            "ltr",
            NULL,
            NULL,
            new BoxComponentBuilder(
                "horizontal",
                array(
                    new TextComponentBuilder(
                        "Copa69 สวัสดีค่ะ 

สนใจโปรโมชั่นใหนกรอกหมายเลข
โปรโมชั่นได้เลยค่ะ..",
                        NULL,
                        NULL,
                        "md",
                        NULL,
                        NULL,
                        true
                    )
                )
            )


        );


        $replyData = new FlexMessageBuilder("Flex", $textReplyMessage);
    } else if ($userMessage == "1") {
        $replyData = new TemplateMessageBuilder(
            'Confirm Template',
            new ConfirmTemplateBuilder(
                'โปรโมชั่นที่ลูกค้าเลือก คือ
" หูฟังบลูทูธ TRUT WIRELESS 5.0 TWS สมัคร 1000 บาท "
ยืนยันการสมัครใช่หรือไม่ ?',
                array(
                    new MessageTemplateActionBuilder(
                        'ใช่',
                        'ใช่'
                    ),
                    new MessageTemplateActionBuilder(
                        'ไม่',
                        'ใม่'
                    )
                )
            )
        );
    } else if ($userMessage == "ใช่") {
        $textReplyMessage = new BubbleContainerBuilder(
            "ltr",
            NULL,NULL,
            new BoxComponentBuilder(
                "horizontal",
                array(
                    new TextComponentBuilder("สมัครเสร็จแจ้งสลีปพร้อมเลขยูส..",NULL,NULL,NULL,NULL,NULL,true)
                )
            ),
            new BoxComponentBuilder(
                "horizontal",
                array(
                    new ButtonComponentBuilder(
                        new UriTemplateActionBuilder("สมัครโปรโมชั่น","https://line.me/R/ti/p/%40519uqyhc"),
                        NULL,NULL,NULL,"primary"
                    )
                )
            )
        );
 
$replyData = new FlexMessageBuilder("Flex",$textReplyMessage);
    } else if(strstr($userMessage, "user_") == true) {
        $textReplyMessage = new BubbleContainerBuilder(
            "ltr",
            NULL,
            NULL,
            new BoxComponentBuilder(
                "horizontal",
                array(
                    new TextComponentBuilder(
                        "ขอชื่อ ที่อยู่ เบอร์โทรลูกค้าด้วยค่ะ..",
                        NULL,
                        NULL,
                        "md",
                        NULL,
                        NULL,
                        true
                    )
                )
            ) 
    
        );
    
    
        $replyData = new FlexMessageBuilder("Flex", $textReplyMessage);
     }   
     
     else 
    //  if(preg_match_all("/^[0]{1}[0-9]{9}{10}/", $userMessage)) 
     if(strstr($userMessage,$test) == true){
        $textReplyMessage = new BubbleContainerBuilder(
            "ltr",
            NULL,
            NULL,
            new BoxComponentBuilder(
                "horizontal",
                array(
                    new TextComponentBuilder(
                        "fghfghgfhgfhgfh",
                        NULL,
                        NULL,
                        "md",
                        NULL,
                        NULL,
                        true
                    )
                )
            ) 
    
        );    
    
        $replyData = new FlexMessageBuilder("Flex", $textReplyMessage);
     } else {
        $actionBuilder = array(
            new MessageTemplateActionBuilder(
                'เรียกดูโปรโมชั่น',
                'เรียกดูโปรโมชั่น'
            ),
            new MessageTemplateActionBuilder(
                'สมัครโปรโมชั่น',
                'สมัครโปรโมชั่น'
            )
        );
        $imageUrl = '';
        $replyData = new TemplateMessageBuilder(
            'เมนูหลัก',
            new ButtonTemplateBuilder(
                'เมนูหลัก',
                'กรุณาเลือกหัวข้อที่ต้องการ',
                $imageUrl,
                $actionBuilder
            )
        );
    }
} 
else if($userImage == null) {
    $textReplyMessage = new BubbleContainerBuilder(
        "ltr",
        NULL,
        NULL,
        new BoxComponentBuilder(
            "horizontal",
            array(
                new TextComponentBuilder(
                    "กรุณาแจ้งเลขยูสค่ะ..

[ รูปแบบ : user_เลขยูสของคุณ ]",
                    NULL,
                    NULL,
                    "md",
                    NULL,
                    NULL,
                    true
                )
            )
        )


    );


    $replyData = new FlexMessageBuilder("Flex", $textReplyMessage);
 }


$response = $bot->replyMessage($replyToken, $replyData);




echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
