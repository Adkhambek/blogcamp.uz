<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

function gmail($to, $subject, $body)
{
    $mail = new PHPMailer;
    $mail->isSMTP(); // in server just comment it
    $mail->Host = 'ssl://smtp.beget.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'info@skillsoft.uz';
    $mail->Password = 'wpm*hsZ2';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('info@skillsoft.uz', 'Blogcamp');
    $mail->addAddress($to);

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $body;
    return $mail->send();

}
function gmails($to, $subject, $image, $post, $readmore)
{
    $mail = new PHPMailer;
    $mail->isSMTP(); // in server just comment it
    $mail->Host = 'ssl://smtp.beget.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'info@skillsoft.uz';
    $mail->Password = 'wpm*hsZ2';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('info@skillsoft.uz', 'Blogcamp');
    $mail->addAddress($to);

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = '<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>A Simple Responsive HTML Email</title>
        <style type="text/css">
            body {
                margin: 0;
                padding: 0;
                min-width: 100% !important;
            }

            img {
                height: auto;
            }

            .content {
                width: 100%;
                max-width: 600px;
            }

            .title {
                padding: 10px;
            }

            .header {
                padding: 30px 30px 30px 30px;
            }

            .innerpadding {
                padding: 30px 30px 30px 30px;
            }



            .subhead {
                font-size: 15px;
                color: #ffffff;
                font-family: sans-serif;
                letter-spacing: 10px;
            }

            .h1,
            .h2,
            .bodycopy {
                color: #153643;
                font-family: sans-serif;
            }

            .h1 {
                font-size: 33px;
                line-height: 38px;
                font-weight: bold;
            }

            .h2 {
                padding: 0 0 15px 0;
                font-size: 24px;
                line-height: 28px;
                font-weight: bold;
            }

            .bodycopy {
                font-size: 16px;
                line-height: 22px;
            }

            .button {
                text-align: center;
                font-size: 18px;
                font-family: sans-serif;
                font-weight: bold;
                padding: 0 30px 0 30px;
            }

            .button a {
                color: #ffffff;
                text-decoration: none;
            }

            .footer {
                padding: 20px 30px 15px 30px;
                background-image: url("http://skillsoft.uz/mail/images/backgr1.png");
                background-position: center top;
                background-size: cover;
            }

            .footercopy {
                font-family: sans-serif;
                font-size: 14px;
                color: #ffffff;
            }

            .footercopy a {
                color: #ffffff;
                text-decoration: underline;
            }

            @media only screen and (max-width: 550px),
            screen and (max-device-width: 550px) {
                body[yahoo] .hide {
                    display: none !important;
                }

                body[yahoo] .buttonwrapper {
                    background-color: transparent !important;
                }

                body[yahoo] .button {
                    padding: 0px !important;
                }

                body[yahoo] .button a {
                    background-color: #00aa15;
                    padding: 15px 15px 13px !important;
                }

                body[yahoo] .unsubscribe {
                    display: block;
                    margin-top: 20px;
                    padding: 10px 50px;
                    background: #2f3942;
                    border-radius: 5px;
                    text-decoration: none !important;
                    font-weight: bold;
                }
            }

            @media only screen and (min-device-width: 601px) {
                .content {
                    width: 600px !important;
                }

                .col425 {
                    width: 425px !important;
                }

                .col380 {
                    width: 300px !important;
                }
            }
        </style>
    </head>

    <body yahoo bgcolor="#f6f8f1">
        <table width="100%" bgcolor="#f6f8f1" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td>

                    <table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <td bgcolor="#125b80" class="header">
                                <table width="70" align="left" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td>
                                            <img class="fix" src="http://skillsoft.uz/mail/images/logo.png" width="200"
                                                border="0" alt="" />
                                        </td>
                                        <td class="subhead" style="padding: 0 0 0 20px;">
                                            YANGILIKLAR
                                        </td>
                                    </tr>
                                </table>

                            </td>
                        </tr>
                        <tr>
                            <td>

                            </td>

                        </tr>
                        <tr>

                            <td class="innerpadding borderbottom">
                                <table class="" style="width: 100%  ">

                                    <tr>
                                        <td class="h2">
                                            ' . $subject . '
                                        </td>
                                    </tr>
                                </table>

                                <table width="200" align="left" border="0" cellpadding="0" cellspacing="0">

                                    <tr>
                                        <td height="115" style="padding: 0 20px 20px 0;">
                                            <img class="fix" src="' . $image . '" width=100%
                                                height="80" border="0" alt="" />
                                        </td>
                                    </tr>
                                </table>
                                <!--[if (gte mso 9)|(IE)]>
                <table width="380" align="left" cellpadding="0" cellspacing="0" border="0">
                  <tr>
                    <td>
              <![endif]-->
                                <table class="col380" align="left" border="0" cellpadding="0" cellspacing="0"
                                    style="width: 100%; max-width: 380px;">
                                    <tr>
                                        <td>
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td class="bodycopy">
                                                    ' . $post . '
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 20px 0 0 0;">
                                                        <table class="buttonwrapper" bgcolor="#00aa15" border="0"
                                                            cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td class="button" height="45">
                                                                    <a href="' . $readmore . '">To\'liq O\'qish</a>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                <!--[if (gte mso 9)|(IE)]>
                    </td>
                  </tr>
              </table>
              <![endif]-->
                            </td>
                        </tr>

                        <tr>
                            <td class="footer">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td align="center" class="footercopy">
                                            &reg; Blogcamp<br />

                                            <span class="hide">Biz ishtimoiy tarmoqlarda</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" style="padding: 20px 0 0 0;">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="25" style="text-align: center; padding: 0 10px 0 10px;">
                                                        <a href="#">
                                                            <img src="http://skillsoft.uz/mail/images/telegram.png"
                                                                width="25" height="25" alt="Telegram" border="0" />
                                                        </a>
                                                    </td>
                                                    <td width="25" style="text-align: center; padding: 0 10px 0 10px;">
                                                        <a href="#">
                                                            <img src="http://skillsoft.uz/mail/images/youtube.png"
                                                                width="25" height="25" alt="Twitter" border="0" />
                                                        </a>
                                                    </td>
                                                    <td width="25" style="text-align: center; padding: 0 10px 0 10px;">
                                                        <a href="#">
                                                            <img src="http://skillsoft.uz/mail/images/instagram.png"
                                                                width="25" height="25" alt="Twitter" border="0" />
                                                        </a>
                                                    </td>
                                                    <td width="25" style="text-align: center; padding: 0 10px 0 10px;">
                                                        <a href="#">
                                                            <img src="http://skillsoft.uz/mail/images/github.png" width="25"
                                                                height="25" alt="Twitter" border="0" />
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <!--[if (gte mso 9)|(IE)]>
              </td>
            </tr>
        </table>
        <![endif]-->
                </td>
            </tr>
        </table>
    </body>

    </html>';
    return $mail->send();

}
