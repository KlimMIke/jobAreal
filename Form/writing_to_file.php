<?php
    $file = fopen("output_file.txt", "w");

    if(!$file) {
        print "<h1>Файл не был найден!</h1>";
    } else {
        $lastname = $_POST["lastname"];
        $firstname = $_POST["firstname"];
        $middlename = $_POST["middlename"];
        $sex = $_POST["sex"];

        fwrite($file, "Фамилия пользователя: ".$lastname."\n");
        fwrite($file, "Имя пользователя: ".$firstname."\n");
        fwrite($file, "Отчество пользователя: ".$middlename."\n");
        fwrite($file, "Пол пользователя: ".$sex."\n");

        print "<h1>Ваша заявка была отправлена!</h1><br>
                <p>Скоро с Вами свяжутся $firstname $middlename!</p>
                <a href='main.html'>
                    <button>На главную</button>
                </a>";
    }

    fclose($file);

?>