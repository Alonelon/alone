<?php

error_reporting(0);
header('Content-Type: application/json');


$webhost = "https://" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME'];
$path    = "mvd";

if (!is_dir("mvd")) {
    mkdir("mvd");
}

$TOKEN = ""; // 1835505226:AAHc-dsx5fhMPuUhaURlIBypqLG8M9_yY20

require("Telegram.php");


$ex = explode(" ", $text);

 //-- المتغيرات --//

 $message = $update->message;
$chat_id = $message->chat->id;
$chat_id2 = $update->callback_query->message->chat->id;
$text = $message->text;
$data = $update->callback_query->data;
$message_id2 = $update->callback_query->message->message_id;
$message = $update->message;
$chat_id = $message->chat->id;
$textmsg = $message->text;
$user = $message->from->username;
$name = $message->from->first_name;
$for = $message->from->id;
$text = $message->text;
$chat_id2 = $update->callback_query->message->chat->id;
$message = $update->message;
$chat_id = $message->chat->id;
$message_id2 = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$from_id = $message->from->id;
$id = $message->from->id;
$name = $update->message->from->first_name;
$from_id = $message->from->id;
$re         = $update->message->reply_to_message;
$re_msgid   = $update->message->reply_to_message->message_id;
$re_id      = $update->message->reply_to_message->from->id;

//-- --//
$rt = $update->message->reply_to_message;
$replyid = $update->message->reply_to_message->message_id;
$tedadmsg = $update->message->message_id;
$edit = $update->edited_message->text;
$re_id = $update->message->reply_to_message->from->id;
$re_user = $update->message->reply_to_message->from->username;
$re_name = $update->message->reply_to_message->from->first_name;
$re_msgid = $update->message->reply_to_message->message_id;
$re_chatid = $update->message->reply_to_message->chat->id;
//-- --//
$admin1 = ; #1053130516
$admin2 = array("$admin","$admins");
$admins = file_put_contents("admin.txt");
$adminList = file_get_contents("AdminList/$id.txt");
mkdir("AdminList");
//-- --//



$statjson = json_decode(file_get_contents("https://api.telegram.org/bot$TOKEN/getChatMember?chat_id=$chat_id&user_id=".$from_id),true); 
$status = $statjson['result']['status'];
$hmd = file_get_contents("$chat_id");
if ($text == "تفعيل اليوتيوب" and $status == "creator" || $status == "administrator" || $id == $adminList ){
file_put_contents("$chat_id","true");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"• تم تفعيل اليوتيوب بنجاح",
'reply_to_message_id'=>$message->message_id,
]);
}

$gt =file_get_contents("tool/$id.txt");
if ($text == "تعطيل اليوتيوب" and $status == "creator" || $status == "administrator" || $id == $adminList ){
    file_put_contents("$chat_id","false");
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"• تم تعطيل اليوتيوب بنجاح",
    'reply_to_message_id'=>$message->message_id,
    ]);
    }

    if($rt and $text == "رفع مطور يوتيوب" and $id == $admin1 ){
        bot('SendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"• العضو : [$re_name](https://t.me/$re_user)
• تمت اضافته الى مطورين اليوتيوب",
            'reply_to_message_id'=>$message->message_id,   
            'parse_mode'=>"markdown",
            'disable_web_page_preview'=>true,
        ]);
        file_put_contents("AdminList/$re_id.txt",$re_id);
    }
    if($rt and $text == "تنزيل مطور يوتيوب" and $id == $admin1 ){
        bot('SendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"• العضو : [$re_name](https://t.me/$re_user)
• تمت ازالته من مطورين اليوتيوب",
            'reply_to_message_id'=>$message->message_id,   
            'parse_mode'=>"markdown",
            'disable_web_page_preview'=>true,
        ]);
        unlink("AdminList/$re_id.txt");
    }
    if($text == "لوحة التحكم" and $id == $admin1 ){
        bot('SendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"* اهلا بك في لوحة التحكم*
            
من هنا تستطيع التحكم باعدادات اليوتيوب .",
            'reply_to_message_id'=>$message->message_id,
            'disable_web_page_preview'=>true,
            'parse_mode'=>"Markdown",
            'reply_markup'=>json_encode([
            'inline_keyboard'=>[
            [["text"=>"تفعيل اليوتيوب","callback_data"=>"TurnON"],["text"=>"تعطيل اليوتيوب","callback_data"=>"TurnOFF"]],
            [["text"=>"رفع مطور","callback_data"=>"AddAdmin"],["text"=>"تنزيل مطور","callback_data"=>"DellAdmin"]],
            [["text"=>"الاوامر العامه","callback_data"=>"CommandList"]],
            ]
            ])
            ]);
            }
            if($data == "ControlPanel" ){
                bot('EditMessageText',[
                    'chat_id'=>$chat_id2,
                    'message_id'=>$message_id2,
                    'text'=>"* اهلا بك في لوحة التحكم*
                    
من هنا تستطيع التحكم باعدادات اليوتيوب .",
                    'reply_to_message_id'=>$message->message_id,
                    'disable_web_page_preview'=>true,
                    'parse_mode'=>"Markdown",
                    'reply_markup'=>json_encode([
                    'inline_keyboard'=>[
                    [["text"=>"تفعيل اليوتيوب","callback_data"=>"TurnON"],["text"=>"تعطيل اليوتيوب","callback_data"=>"TurnOFF"]],
                    [["text"=>"رفع مطور","callback_data"=>"AddAdmin"],["text"=>"تنزيل مطور","callback_data"=>"DellAdmin"]],
                    [["text"=>"الاوامر العامه","callback_data"=>"CommandList"]],
                    ]
                    ])
                    ]);
                    }
            if($data == "TurnON"){
                bot('EditMessageText',[
                    'chat_id'=>$chat_id2,
                    'message_id'=>$message_id2,
                    'text'=>"• اهلا عزيزي المطور
• تم تفعيل اليوتيوب بنجاح",
            'reply_to_message_id'=>$message->message_id,
            'disable_web_page_preview'=>true,
            'parse_mode'=>"Markdown",
            'reply_markup'=>json_encode([
            'inline_keyboard'=>[
            [["text"=>"رجوع","callback_data"=>"ControlPanel"]],
            ]
            ])
            ]);
            file_put_contents("$chat_id2","true");
            }
            if($data == "TurnOFF"){
                bot('EditMessageText',[
                    'chat_id'=>$chat_id2,
                    'message_id'=>$message_id2,
                    'text'=>"• اهلا عزيزي المطور
• تم تعطيل اليوتيوب بنجاح",
            'reply_to_message_id'=>$message->message_id,
            'disable_web_page_preview'=>true,
            'parse_mode'=>"Markdown",
            'reply_markup'=>json_encode([
            'inline_keyboard'=>[
            [["text"=>"رجوع","callback_data"=>"ControlPanel"]],
            ]
            ])
            ]);
            file_put_contents("$chat_id2","false");
            }
            if($data == 'AddAdmin'){
                file_put_contents($chat_id2,'AddAdmin');
                bot('EditMessageText',[
                    'chat_id'=>$chat_id2,
                    'message_id'=>$message_id2,
                    'text'=>"ارسل ايدي الشخص لرفعه مطور يوتيوب ",
                    'parse_mode'=>"markdown",
          'disable_web_page_preview'=>true,
          'reply_markup'=>json_encode(['inline_keyboard'=>[
            [['text'=>'رجوع','callback_data'=>'ControlPanel']],
          ],
          ])
                ]);
               }
            $addAdmin = file_get_contents($chat_id);
            if($text and $addAdmin == 'AddAdmin'){
                bot('sendMessage' ,[
                    'chat_id'=>$chat_id,
                    'text'=>"• اهلا عزيزي المطور
• تمت اضافته الى مطورين اليوتيوب
                      ",
                              'parse_mode'=>"markdown",
          'disable_web_page_preview'=>true,
          'reply_markup'=>json_encode(['inline_keyboard'=>[
            [['text'=>'رجوع','callback_data'=>'ControlPanel']],
          ],
          ])
                ]);
                file_put_contents("AdminList/$text.txt",$text);
                unlink($chat_id);
            }
            if($data == 'DellAdmin'){
                file_put_contents($chat_id2,'DellAdmin');
                bot('EditMessageText',[
                    'chat_id'=>$chat_id2,
                    'message_id'=>$message_id2,
                    'text'=>"ارسل ايدي الشخص المراد تنزيله",
                    'parse_mode'=>"markdown",
          'disable_web_page_preview'=>true,
          'reply_markup'=>json_encode(['inline_keyboard'=>[
            [['text'=>'رجوع','callback_data'=>'ControlPanel']],
          ],
          ])
                ]);
               }
            $DellAdmin = file_get_contents($chat_id);
            if($text and $DellAdmin == 'DellAdmin'){
                bot('sendMessage' ,[
                    'chat_id'=>$chat_id,
                    'text'=>"• اهلا عزيزي المطور
• تمت ازالته من مطورين اليوتيوب
                      ",
                              'parse_mode'=>"markdown",
          'disable_web_page_preview'=>true,
          'reply_markup'=>json_encode(['inline_keyboard'=>[
            [['text'=>'رجوع','callback_data'=>'ControlPanel']],
          ],
          ])
                ]);
                unlink("AdminList/$text.txt");
                unlink($chat_id);
            }
            if($data == "CommandList" ){
                bot('EditMessageText',[
                    'chat_id'=>$chat_id2,
                    'message_id'=>$message_id2,
                    'text'=>"*اهلا بك في قائمة الاورم العامه*
                    
لتفعيل اليوتيوب ( ارسل تفعيل اليوتيوب )
لتعطيل اليوتيوب ( ارسل تعطيل اليوتيوب )
                    
طريقة البحث سهله
فقط ارسل بحث + اسم الاغنيه الي تبيها
و تقدر تشارك الاغنيه اونلاين عن خلال انك تكتب معرف البوت و اسم الاغنيه
                    
للبحث بطريقة اخرى
اسم الاغنيه + !!
اسم الفيد + ??",
        'parse_mode'=>"Markdown",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [["text"=>"رجوع","callback_data"=>"ControlPanel"]],
        ]
        ])
        ]);
        }


    
if ((strpos($text, "؟؟") !== false || strpos($text, "??") !== false) and $hmd == "true" ) {
    if (strpos($text, "؟؟") !== false) {
        $text = str_replace("؟؟", null, $text);
    } elseif (strpos($text, "??") !== false) {
        $text = str_replace("??", null, $text);
    }

    $info   = json_decode(file_get_contents("$path/info.json"), True);
    $msgid  = SendMessage($chat_id, "جاري التحميل...")->result->message_id;
    $search = s($text);
    $title  = $search['result']['Title'][0];
    $url    = $search['result']['Link'][0];

    if ($info["video:$url"]['vid'] == $url) {
        // file_id  exists
        $file_id   = $info["video:$url"]['file_id'];
        $MB      = $info["video:$url"]['size'];
        $title     = str_replace("_", null, $info["video:$url"]['title']);
        $caption         = "*@SO_NAP*$MB MB";
        SendVideo($chat_id, $file_id, null, null, null, $url, $caption, "MARKDOWN", null);
        DeleteMessage($chat_id, $msgid);
        exit;
    }

    $get    = dv("https://www.youtube.com/watch?v=$url")['result']['formats'];
    $dv     =  $get['link'];
    $MB     =   number_format($get['bytes'] / 1048576, 2);

    if ($get['bytes'] >= 52428800) {
        error($chat_id, [0 => "الحجم كبير جدا لايسمح التليكرام بأكبر من 50 ميغا بايت ."]);
        DeleteMessage($chat_id, $msgid);
        exit;
    }
    download($dv, "$path/" . $title . ".mp4");
    DeleteMessage($chat_id, $msgid);

    $caption         = "*@SO_NAP* $MB MB";
    $video_file_id   = SendVideo($chat_id, new CURLFile("$path/$title.mp4"), null, null, null, $url, $caption, "MARKDOWN", $message_id)->result->video->file_id;
    unlink("$path/$title.mp4");
    if ($video_file_id == null) {
        error($chat_id, [0 => "حدث خطأ لايمكن التحميل ."]);
        exit;
    }

    $info["video:$url"] = [
        'file_id' => $video_file_id,
        'size'    => $MB,
        'title'   => $title,
        'vid'     => $url
    ];
    save($info, "$path/info.json");
} // end of mp4



if (strpos($text, "!!") !== false || $data and $hmd == "true" ) {
    $text = str_replace(" !!", null, $text);


    $info   = json_decode(file_get_contents("$path/info.json"), True);
    $msgid  = SendMessage($chat_id, "جاري التحميل...")->result->message_id;

    if (isset($data)) {
        DeleteMessage($chat_id, $message_id);
        $url    = $data;
        $title  = $textdata;
        $message_id = $message_id - 1;
    } else {
        $search = s($text);
        $title  = $search['result']['Title'][0];
        $url    = $search['result']['Link'][0];
    }

    if ($info["audio:$url"]['vid'] == $url) {
        // file_id  exists
        $file_id   = $info["audio:$url"]['file_id'];
        $MB      = $info["audio:$url"]['size'];
        $title     = str_replace("_", null, $info["audio:$url"]['title']);
        $caption         = "*@SO_NAP* $MB MB";
        SendAudio($chat_id, $file_id, $caption, "MARKDOWN", null, "@SO_NAP .", $title, null, $message_id);
        DeleteMessage($chat_id, $msgid);
        exit;
    }

    $au     = da($url)['result']['m4a'];
    download($au, "$path/" . $title . ".mp3");
    DeleteMessage($chat_id, $msgid);
    $MB   = number_format(filesize("$path/$title.mp3") / 1048576, 2);
    $caption         = "*@SO_NAP* $MB MB";
    $audio_file_id = SendAudio($chat_id, new CURLFile("$path/$title.mp3"), $caption, "MARKDOWN", null, "@SO_NAP .", $title, null, $message_id)->result->audio->file_id;
    unlink("$path/$title.mp3");
    if ($audio_file_id == null) {
        error($chat_id, [0 => "حدث خطأ لايمكن التحميل ."]);
        exit;
    }

    if (!$data) {
        $info["search"][$text] = "$text@@@$url";

        $info["audio:$url"] = [
            'file_id' => $audio_file_id,
            'size'    => $MB,
            'title'   => $title,
            'vid'     => $url
        ];
        save($info, "$path/info.json");
    }
} // end of mp3

// inline query... 

if ($inline_query) {
    $info   = json_decode(file_get_contents("$path/info.json"), True);

    foreach (array_keys($info['search']) as $k) {
        if (preg_match("#$inline_query#", $info['search'][$k])) {
            $array['ok'] = true;
            $array['result'][] = $info['search'][$k];
        }
    }

    for ($i = 0; $i < count($array['result']); $i++) {
        $exp      = explode("@@@", $array['result'][$i]);
        $link     = $exp[1];
        $inf      = $info["audio:$link"];
        $file_id  = $inf['file_id'];
        $title    = $inf['title'];
        $size     = $inf['size'];

        $inline_results[$i] =
            [
                'parse_mode' => "MARKDOWN",
                'disable_web_page_preview' => true,
                'thumb_url' => "https://www.youtube.com/watch?v=$link",
                'type' => 'audio',
                'id' => base64_encode(rand(5, 555)),
                'title' => $title,
                'audio_file_id' => $file_id,
                'caption' => " size - $size",
            ];
    }
    AnswerInlineQuery($inline_query_id, json_encode($inline_results));
}


# searching....

if ($ex[0] == "بحث" and $hmd == "true" ) {
    $srch = str_replace("بحث ", null, $text);
    $keyboard = [];
    $search =  s($srch);
    for ($b = 0; $b <= 9; $b++) {
        $keyboard['inline_keyboard'][] = [['text' => $search['result']['Title'][$b], 'callback_data' => $search['result']['Link'][$b]]];
    }
    $inline = json_encode($keyboard);
    $inf = "• اختر من هنا من فضلك";
    SendMessage($chat_id, $inf, "MARKDOWN", true, $message_id, $inline);
}

// Converter to sound...

if ($reply) {
    if ($text == "صوتيه") {
        if ($reply_audio) {
            $getfile = GetFile($reply_audio_file_id)->result->file_path;
            if ($getfile == null) {
                SendMessage($chat_id, "description: Bad Request: file is too big", "MARKDOWN", false, $message_id);
                exit;
            }
            $file = File_path($getfile);
            if ($file == null) {
                SendMessage($chat_id, "description: Bad Request: something went wrong", null, false, $message_id);
                exit;
            }
            if ($reply_caption == null) {
                $reply_caption = "- There is no title !!";
            }
            $str_caption = str_replace("الاغنيه", "الصوتيه", $reply_caption);
            file_put_contents("$path/$str_caption.ogg", $file);
            SendVoice($chat_id, new CURLFile("$path/$str_caption.ogg"), "*$str_caption*", "MARKDOWN");
            unlink("$path/$str_caption.ogg");
        } else {
            $inf    = "*يجب ان يكول الرد على اغنيه لكي استطيع تحويلها الى صوت !*";
            SendMessage($chat_id, $inf, "MARKDOWN", false, $message_id);
        }
    }
}
