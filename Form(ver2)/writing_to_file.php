<?php
    $lastname = $firstname = $middlename = $sex = $email = $phone = $city = $adress = "";
    $lastname_err = $firstname_err = $sex_err = $email_err = $phone_err = "";
    $file = fopen("output_file.txt", "w");

    if(!$file) {
        print "<h1>Файл не был найден!</h1>";
    } else {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $lastname = htmlspecialchars($_POST["lastname"]);
            $firstname = htmlspecialchars($_POST["firstname"]);
            $middlename = htmlspecialchars($_POST["middlename"]);
            $sex = ($_POST["sex"]);
            $email = htmlspecialchars($_POST["email"]);
            $phone = htmlspecialchars($_POST["phone"]);
            $city = htmlspecialchars($_POST["city"]);
            $adress = htmlspecialchars($_POST["adress"]);

            if(empty($lastname)) {
               $lastname_err = "<div class='text' style='height: 30px'><span class='errorValid'>Поле 'Фамилия' не может быть пустым!</span></div><br>";
            } elseif(!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
                $lastname_err = "<div class='text' style='height: 30px'><span class='errorValid'>У поля 'Фамилия' неверный формат!</span></div><br>";
            }
            if(empty($firstname)) {
                $firstname_err = "<div class='text' style='height: 30px'><span class='errorValid'>Поле 'Имя' не может быть пустым!</span></div><br>";

            } elseif (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
                $firstname_err = "<div class='text' style='height: 30px'><span class='errorValid'>У поля 'Имя' неверный формат!</span></div><br>";
            }
            if(!isset($sex)) {
               $sex_err = "<div class='text' style='height: 30px'><span class='errorValid'>Вы не ввели пол!</span></div><br>";
            }
            if(empty($email)) {
                $email_err = "<div class='text' style='height: 30px'><span class='errorValid'>Поле 'e-mail' не может быть пустым!</span></div><br>";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email_err = "<div class='text'><span class='errorValid'>У поля 'e-mail' неверный формат!</span></div><br>";
            }
            if(empty($phone)) {
                $phone_err = "<div class='text' style='height: 30px'><span class='errorValid'>Поле 'Телефон' не может быть пустым!</span></div><br>";
            } elseif(!preg_match("/^[0-9 ]*$/",$phone)) {
                $phone_err = "<div class='text' style='height: 30px'><span class='errorValid'>У поля 'Телефон' неверный формат!</span></div><br>";
            }

            if(strlen($lastname_err)>0 || strlen($firstname_err)>0 || strlen($sex_err)>0 || strlen($email_err)>0 || strlen($phone_err)>0) {
                print "
                <html>
                <link type='text/css' rel='stylesheet' href='style.css'>
                <body>
                <div class='main'>
                     $lastname_err $firstname_err $sex_err $email_err $phone_err
                     <a href='main.html'><button class='btn' style='margin-top: 30px'>На главную</button></a>
                </div>
                </body>
                </html>";

            } elseif(strlen($lastname_err)==0 && strlen($firstname_err)==0 && strlen($sex_err)==0 && strlen($email_err)==0 && strlen($phone_err)==0) {

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
                print "
                <html>
                <link type='text/css' rel='stylesheet' href='style.css'>
                <body>
                <div class='main'>
                     <div class='note'>Произошла какая-то ошибка! Повторите попытку, перейдя по кнопке снизу.</div>
                     <a href='main.html'><button class='btn' style='margin-top: 30px'>На главную</button></a>
                </div>
                </body>
                </html>";
            }
        } else {
            print "<p> Извините, что-то произошло на сервере...</p>";
        }
    }

    fclose($file);

?>