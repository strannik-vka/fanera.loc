<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormController extends Controller
{

    // функция отправки письма
    public function send_mail($message)
    {
        // почта, на которую придет письмо
        $mail_to = "gerodsa@mail.ru, tak-i-tak-rf@mail.ru";
        // $mail_to = "jasmak@mail.ru";
        // тема письма
        $subject = "Письмо с сайта http://fanera.mollitera.ru";

        // заголовок письма
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n"; // кодировка письма
        $headers .= "From: Заказ <no-reply@test.com>\r\n"; // от кого письмо

        // отправляем письмо
        mail($mail_to, $subject, $message, $headers);
    }

    public function send(Request $request)
    {
        $msg_box = ""; // в этой переменной будем хранить сообщения формы
        $errors = array(); // контейнер для ошибок
        // проверяем корректность полей
        if ($request['name'] == "") $errors['name'] = "Поле 'Ваше имя' не заполнено!";
        if ($request['phone'] == "") $errors['phone'] = "Поле 'Ваш Телефон' не заполнено!";

        // если форма без ошибок
        if (empty($errors)) {
            // собираем данные из формы
            $message = "Имя пользователя: " . $request['name'] . "<br/>";
            $message .= "Телефон пользователя: " . $request['phone'] . "<br/>";
            $message .= "Откуда форма: " . $request['message'];
            $this->send_mail($message); // отправим письмо
            // выведем сообщение об успехе
            //  $msg_box = "<span style='color: green;'>Сообщение успешно отправлено!</span>";

            $result['success'] = 'Сообщение успешно отправлено!';
        } else {
            // если были ошибки, то выводим их
            //  $msg_box = "";
            //  foreach ($errors as $one_error) {
            //    $msg_box .= "<span style='color: red;'>$one_error</span><br/>";
            //  }

            $result['errors'] = $errors;
        }

        // делаем ответ на клиентскую часть в формате JSON
        return $result;
    }
}
