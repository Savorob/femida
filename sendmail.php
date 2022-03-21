<?php
    //Подключаем PHP Mailer
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru', 'phpmailer/language/');
    $mail->isHTML(true);

    //От кого
    $mail->Host       = 'smtp.beget.com'; // SMTP сервера вашей почты
    $mail->Username   = '***@savorob.ru'; // Логин на почте
    $mail->Password   = '***'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('femida@savorob.ru', 'ЮК Фемида'); // Адрес самой почты и имя отправителя
    //Кому
    $mail->addAddress('***@ya.ru');
    $mail->addAddress('***@ya.ru');
    //Тема письма
    $mail->Subject = 'Обратная связь ЮК ФЕМИДА';
    
    //Тело письма
    $body = '<h1>Письмо от посетителя сайта ЮК Фемида</h1>';

    if(trim(!empty($_POST['name']))){
        $body.='<p><srong>Имя:</srong> '.$_POST['name'].'</p>';
    }
    if(trim(!empty($_POST['email']))){
        $body.='<p><srong>E-mail:</srong> '.$_POST['email'].'</p>';
    }
    if(trim(!empty($_POST['email']))){
        $body.='<p><srong>Сообщение:</srong> '.$_POST['message'].'</p>';
    }

    $mail->Body = $body;

    //Отправка
    if (!$mail->send()) {
        $message = 'Ошибка отправки!';
    } else {
        $message = 'Письмо отправлено!';
    }

    $response = ['message' => $message];

    header('Content-type: application/json');
    echo json_encode($response);
?>