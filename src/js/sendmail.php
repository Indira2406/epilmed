<?php
    if($_POST) {

        $subject = $_POST['subject'];
        $name    = $_POST['name'];
        $phone   = $_POST['phone'];

        $to      = "anya14_93@mail.ru";

        if ($name != "") {
            $tr_name = '<tr><td><b>Имя: </b></td><td>'.$name.'</td></tr>';
        }
        if ($phone != "") {
            $tr_phone = '<tr><td><b>Телефон: </b></td><td>'.$phone.'</td></tr>';
        }

        $message = '
            <html>
                <head>
                    <title>'.$subject.'</title>
                </head>
                <body>
                    <table>'.$tr_name.$tr_phone.'</table>
                </body>
            </html>
        ';

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= 'From: '.  $_SERVER['HTTP_HOST']  . "\r\n";
        $headers .= 'Reply-To: '.$email."\r\n";
        $headers .= 'X-Mailer: PHP/'. phpversion();

        var_dump($to, $subject, $message, $headers);
        mail($to, $subject, $message, $headers);
        
    }
?>
