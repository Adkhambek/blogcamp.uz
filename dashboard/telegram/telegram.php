<?php
$token = '1382297121:AAGXYjQhfN18UN1CGt2b6jVmXnFGpqxJinY';
$channel_id = -1001454142483;
function bot($method, $datas = [])
{
    global $token;
    $url = "https://api.telegram.org/bot" . $token . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
}
// for body 400 strlen

function send2($title, $body, $photo)
{
    global $channel_id;

    $caption = "<b>" . $title . "</b>" . "\n\n" . $body . "\n" . "\n<a href=\"http://blogcamp.uz\">bolgcamp.uz</a> <b>Ichtimoiy tarmoqlari</b> 👇" .
        "\n\n<a href=\"https://t.me/blogcamp_uz\">Telegram</a>|<a href=\"https://t.me/blogcamp_uz\">Youtube</a>|<a href=\"https://t.me/blogcamp_uz\">Instagram</a>";

    bot('sendphoto', [
        'chat_id' => $channel_id,
        'parse_mode' => 'html',
        'photo' => $photo,
        'caption' => $caption,

    ]);
}
