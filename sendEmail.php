<?php

$to = "etigresi2@outlook.es";
$subject = "Welcome to Pluche LITE";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


$message = '<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>

  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="x-apple-disable-message-reformatting">.
  <title></title>
  
  <style>
    table, td, div, h1, p {font-family: Arial, sans-serif;}
  </style>
</head>
<body style="margin:0;padding:0;">
  <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
    <tr>
      <td align="center" style="padding:0;">
        <table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
          <tr>
            <td align="center" style="padding:40px 0 30px 0;background:#152f3a;">
              <img src="https://i.imgur.com/JDWJ2to.png" alt="" width="300" style="height:auto;display:block;" />
            </td>
          </tr>
          <tr>
            <td style="padding:36px 30px 42px 30px;">
              <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                <tr>
                  <td style="padding:0 0 36px 0;color:#153643;">

                    <div style="text-align: center;">
                        <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;">Thank You!</h1>
                    </div>

                    <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">In Pluche LITE, we are compromised with the success of each one of your purchases; thank you for joining our family</p>
                    <p style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><a href="http://127.0.0.1:5500/index.php" style="color:#ee4c50;text-decoration:underline;">Visit us now!</a></p>
                  </td>
                </tr>
                <tr>
                  <td style="padding:0;">
                    <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                      <tr>
                        <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                          <p style="margin:0 0 25px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><img src="https://i.imgur.com/ze5D7K0.jpg" alt="" width="260" style="height:auto;display:block;" /></p>
                          <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Our best products are waiting for you! Take a look now.</p>
                          <p style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><a href="http://127.0.0.1:5500/products.php" style="color:#ee4c50;text-decoration:underline;">Our products</a></p>
                        </td>
                        <td style="width:20px;padding:0;font-size:0;line-height:0;">&nbsp;</td>
                        <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                          <p style="margin:0 0 25px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><img src="https://i.imgur.com/g0AHMr9.jpg" alt="" width="260" style="height:auto;display:block;" /></p>
                          <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Learn more about us and our future with you.</p>
                          <p style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><a href="http://127.0.0.1:5500/aboutUs.php" style="color:#ee4c50;text-decoration:underline;">About Us</a></p>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td style="padding:30px;background:#5e5e5e;">
              <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">
                <tr>
                  <td style="padding:0;width:50%;" align="left">
                    <p style="margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;">
                      &reg;8th Pino Street
                      Paris, France<br/><a href="" style="color:#ffffff;text-decoration:underline;">Unsubscribe</a>
                    </p>
                  </td>
                  <td style="padding:0;width:50%;" align="right">
                    <table role="presentation" style="border-collapse:collapse;border:0;border-spacing:0;">
                      <tr>
                        <td style="padding:0 0 0 10px;width:38px;">
                          <a href="http://www.twitter.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/tw_1.png" alt="Twitter" width="38" style="height:auto;display:block;border:0;" /></a>
                        </td>
                        <td style="padding:0 0 0 10px;width:38px;">
                          <a href="http://www.facebook.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/fb_1.png" alt="Facebook" width="38" style="height:auto;display:block;border:0;" /></a>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>';


mail($to, $subject, $message, $headers);


?>