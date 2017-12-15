<?php
*/Semo & Rame*/

*/@php18 & @Xxx_DEVRAMI_xxX*/

define('API_KEY', 'التوكن');
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

function SendMessage($chatid,$text,$parsmde,$disable_web_page_preview,$keyboard){
 bot('sendMessage',[
 'chat_id'=>$chatid,
 'text'=>$text,
 'parse_mode'=>$parsmde,
 'disable_web_page_preview'=>$disable_web_page_preview,
 'reply_markup'=>$keyboard
 ]);
 } 
 function sendphoto($chat_id, $photo, $caption){
 bot('sendphoto',[
 'chat_id'=>$chat_id,
 'photo'=>$photo,
 'caption'=>$caption,
 ]);
 }
 function Forward($chatid,$from_chat,$message_id){
  bot('ForwardMessage',[
  'chat_id'=>$chatid,
  'from_chat_id'=>$from_chat,
  'message_id'=>$message_id
  ]);
  }
function senddocument($chat_id,$document,$caption){
    bot('senddocument',[
        'chat_id'=>$chat_id,
        'document'=>$document,
        'caption'=>$caption
    ]);
}
 function sendvideo($chat_id, $video, $caption){
 bot('sendvideo',[
 'chat_id'=>$chat_id,
 'photo'=>$video,
 'caption'=>$caption,
 ]);
 }
 function sendaudio($chat_id, $audio, $caption){
 bot('sendaudio',[
 'chat_id'=>$chat_id,
 'audio'=>$audio,
 'caption'=>$caption,
 ]);
 }

$update = json_decode(file_get_contents('php://input'));
$message = $update->message; 
$chat_id = $message->chat->id;
$from_id = $update->message->from->id;
$text = $message->text;
@mkdir("data/$chat_id");
@$rezasss = file_get_contents("data/$chat_id/reza.txt");
$admin = 141310697;
$panel = file_get_contents("mirtm.txt");
$name = $message->from->first_name;
$lastname = $message->from->last_name;
$username = $message->from->username;
$from_id = $message->from->id;
//=========ŝšş™=========//
if($text == '/start'){
$user = file_get_contents('Member.txt');
$members = explode("\n",$user);
if (!in_array($chat_id,$members)){
$add_user = file_get_contents('Member.txt');
$add_user .= $chat_id."\n";
file_put_contents('Member.txt',$add_user);
}
bot('sendMessage', [
'chat_id' => $chat_id,
'text'=>"مرحبا بك $name

▪ في بوت تحميل قوالب الموقع 

▫ الان يمكن تحميل قالب اي موقع

▪ في *Google* ونشاء موقعك

▫ في قالب جاهز بدون اي عناء

▪ القوالب ستكون في لغه *HTML*",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
'keyboard'=>[
[
['text'=>"تحميل قالب موقع 🌐"]
],
[
['text'=>"تعليمات البوت 📚"],['text'=>"📚 Instructions bot"]
],
[
['text'=>"تواصل معنا ☎️"]
],
[
['text'=>"النجاح 🖥"]
],
]
])
]);
}
if($text == 'تحميل قالب موقع 🌐'){
file_put_contents("data/$from_id/reza.txt","dansite");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"حسنا ارسل لي رابط الموقع الان 
ويجب ان يبدا بـ http او https 🌐",
 'parse_mode'=>"html",
'reply_markup'=>json_encode([
'keyboard'=>[
[
['text'=>"رجوع ⏪"]
],
]
])
]);
}
elseif($rezasss == 'dansite'){
$dan = file_get_contents("$text");
file_put_contents("data/$from_id/q.html", $dan);
file_put_contents("data/$from_id/reza.txt","djsjshhwhah");
    bot('senddocument',[
        'chat_id'=>$chat_id,
        'document'=>new CURLFile("data/$from_id/q.html"),
        'caption'=>"ممتاز تم تحميل قالب الموقع 📥",
         'parse_mode'=>"MarkDown",
 'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"النجاح ✔️",'url'=>"t.me/php18"]
]
]
])
 ]);
}
if($text == "رجوع ⏪"){
file_put_contents("data/$from_id/reza".txt,"");
file_put_contents("mirtm.txt","");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم الرجوع للقائمه الرئيسيه 🔙",
'parse_mode'=>"markDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[
['text'=>"تحميل قالب موقع 🌐"]
],
[
['text'=>"تعليمات البوت 📚"],['text'=>"📚 Instructions bot"]
],
[
['text'=>"تواصل معنا ☎️"]
],
[
['text'=>"النجاح 🖥"]
],
]
])
]);
}
if($text == "النجاح 🖥"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"قناه النجاح ✔ لكل ما 💡
هو جديد في البوتات 💡",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"النجاح ✔",'url'=>"http://telegram.me/php18"]
],
]
])
]);
}
if($text == "تواصل معنا ☎️"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"للتواصل معنا اظغط هنا ⤵️",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"تواصل النجاح ✔",'url'=>"http://telegram.me/ts8bot"]
],
]
])
]);
}
if($text == "تعليمات البوت 📚"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"عزيزي $name

▪ لتحميل قالب لموقع ما عليك 📥
▪ باتباع الخطوات وهي كلاتي ⤵️

▫اظغط علئ زر تحميل قالب موقع 🌐
▫️ يطلب منك البوت رابط للموقع 🌐
▫️عند ارسالك الرابط سيرسل لك البوت  ▫️ملف قالب الموقع جاهز في لغه *Html*",
 'parse_mode'=>"MarkDown",
 'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"النجاح ✔",'url'=>"t.me/php18"]
]
]
])
 ]);
}
if($text == "📚 Instructions bot"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"Dear $name

▪ To select a template for what you 📥
▪ By following steps, namely klaten ⤵environment

▫Click on the Download button website template 
▫ Environment asks you the bot link to the site 
▫Environment when sent to the link will send you to the bot ▫environment file website template ready in the moonshine Html",

]);
}
?>
