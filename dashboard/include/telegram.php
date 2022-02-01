<?php
$token = '1382297121:AAGXYjQhfN18UN1CGt2b6jVmXnFGpqxJinY';
$channel_id = -1001477220798;

function send1($title, $body, $photo, $readmore)
{
    global $token, $channel_id;
    define('url', "https://api.telegram.org/bot" . $token);

    $caption = "<strong>" . $title . "</strong>" . "\n\n" . $body . "\n\n" . "👉<a href = \"$readmore\"> To'liq o'qish</a>" . "\n\n" . " <a href=\"http://blogcamp.uz\">bolgcamp.uz</a> <b>Ichtimoiy tarmoqlari</b> 👇" .
        "\n\n<a href=\"https://t.me/blogcamp\">Telegram</a>|<a href=\"https://bit.ly/34irCZU\">Youtube</a>|<a href=\"https://bit.ly/2EaXF3i\">Instagram</a>";
    $keyboards = [
        "inline_keyboard" => [
            [
                ["text" => "To'liq oqish", "url" => $readmore],

            ],
        ],
    ];
    $keyboard = json_encode($keyboards, true);

    file_get_contents(url . "/sendPhoto?photo=" . $photo . "&caption=" . urlencode($caption) . "&chat_id=" . $channel_id . "&parse_mode=HTML&reply_markup=" . $keyboard);

}

function send2($title, $body, $photo)
{
    global $token, $channel_id;

    define('url', "https://api.telegram.org/bot" . $token);

    $caption = "<strong>" . $title . "</strong>" . "\n\n" . $body . "\n\n" . " <a href=\"http://blogcamp.uz\">bolgcamp.uz</a> <b>Ichtimoiy tarmoqlari</b> 👇" .
        "\n\n<a href=\"https://t.me/blogcamp_uz\">Telegram</a>|<a href=\"https://t.me/blogcamp_uz\">Youtube</a>|<a href=\"https://t.me/blogcamp_uz\">Instagram</a>";

    file_get_contents(url . "/sendPhoto?photo=" . $photo . "&caption=" . urlencode($caption) . "&chat_id=" . $channel_id . "&parse_mode=HTML");

}
