<?php
    $file = fopen("output_file.txt", "w");

    if(!$file) {
        print "<h1>Файл не был найден!</h1>";
    } else {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $lastname = htmlspecialchars($_POST["lastname"]);
            $firstname = htmlspecialchars($_POST["firstname"]);
            $middlename = htmlspecialchars($_POST["middlename"]);
            $sex = htmlspecialchars($_POST["sex"]);
            $email = htmlspecialchars($_POST["email"]);
            $phone = htmlspecialchars($_POST["phone"]);
            $city = htmlspecialchars($_POST["city"]);
            $adress = htmlspecialchars($_POST["adress"]);

            fwrite($file, "Фамилия пользователя: ".$lastname."\n");
            fwrite($file, "Имя пользователя: ".$firstname."\n");
            fwrite($file, "Отчество пользователя: ".$middlename."\n");
            fwrite($file, "Пол пользователя: ".$sex."\n");
            fwrite($file, "E-mail пользователя: ".$email."\n");
            fwrite($file, "Телефон пользователя: ".$phone."\n");
            fwrite($file, "Город пользователя: ".$city."\n");
            fwrite($file, "Адресс пользователя: ".$adress."\n");

            print "
                <html>
                <link type='text/css' rel='stylesheet' href='style.css'>
                <body>
                <div class='main'>
                    <h1 class='note' style='font-size: 26px; text-align: center'>Ваша заявка была отправлена!</h1>
                    <p class='note' style='text-align: center'>Скоро с Вами свяжутся $firstname $middlename!</p>
                    <a href='main.html'><button class='btn'>На главную</button></a>
                </div>
                </body>
                </html>";
        } else {
            print "<p> Извините, что-то произошло на сервере...</p>";
        }
    }

    fclose($file);

?>