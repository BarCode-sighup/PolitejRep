<?php
$errorStatus = 'http://178.35.152.24/dashboard/index.php?';

if (isset($_POST["SoDefaultButton"])){

    if(isset($_POST["name"]) and $_POST["name"]!=NULL){
        $errorStatus.='name=0&';
    }
    else{
        $errorStatus.='name=1&';
    }
    if(isset($_POST["gridRadios"]) and $_POST["gridRadios"]!=null){
        $errorStatus.='gridRadios=0&';
    }
    else {
        $errorStatus.='gridRadios=1&';
    }

    if (isset($_FILES["file"])){
       $errorStatus.='file=0&';
    }
    else{
        $errorStatus.='file=1&';
    }

}
//echo "<pre>";
//var_dump($_FILES);
//echo "</pre>";


if ($errorStatus==='http://178.35.152.24/dashboard/index.php?name=0&gridRadios=0&file=0&'){

$link = mysqli_connect(
'localhost', //Сервер
'root', //Имя пользователя
'', //Пароль
'kategorii' //Имя БД
);
mysqli_set_charset($link, "utf8");
var_dump ( mysqli_character_set_name($link));



if ( !$link ) {
die("Ничего не получилось, никаких БД сегодня(");
mysqli_close($link);
}


$name = basename($_FILES["file"]["name"]);
move_uploaded_file($_FILES["file"]["tmp_name"], "C:\\\\xampp\\\\htdocs\\\\dashboard\\\\Images\\\\$name");
$FileDestinatin="http:\\\\\\\\178.35.152.24\\\\Images\\\\$name";
//Составить запрос
$query = "INSERT INTO kategorii SET name='{$_POST['name']}', gridRadios='{$_POST['gridRadios']}', file='$FileDestinatin'"; //users заменить на имя таблицы, к которой хочется обратиться
//Выполнить запрос
$result = mysqli_query($link, $query);
var_dump($result); // Информация о результате запроса, не сам результат
//Можно, например, предварительно узнать, сколько записей получено

    echo "$query";
//Получить список записей
   header("Location: http://178.35.152.24/index.php?");
}
 else {
     header("Location: $errorStatus");
}
?>



















