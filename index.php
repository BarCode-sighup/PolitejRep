<!DOCTYPE html>
<?php

$link = mysqli_connect(
    'localhost', //Сервер
    'root', //Имя пользователя
    '', //Пароль
    'kategorii' //Имя БД
);

if ( !$link ) {
    die("Ничего не получилось, никаких БД сегодня(");
    mysqli_close($link);
}

//Составить запрос
$query = 'SELECT * FROM kategorii'; //users заменить на имя таблицы, к которой хочется обратиться
//Выполнить запрос
$result = mysqli_query($link, $query);
//var_dump($result); // Информация о результате запроса, не сам результат
//Можно, например, предварительно узнать, сколько записей получено
//echo "<br>Vsego zapisey vernulos: " . (mysqli_num_rows($result)) . "<br>";

//Получить список записей


?>
<html lang="ru" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Best Web</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="PolitejStyle.css">
   

    <script type="text/javascript" src="script.js"></script>
</head>
<body>

<div class=" card_creation col-md-8">
    <div class="card-body">
        <h1 class="card-title">Конфигурация</h1>



        <hr class="my-4">
        <form  class="needs-validation" novalidate enctype="multipart/form-data" action="Obrobotchik.php" method="post">
        <fieldset class="form-group">
            <div class="row">
                <legend class="col-form-label col-sm-12 pt-0">Выберите сторону, с которой будет доступно меню выбора <p>Вы можете просмотреть варианты конфигураций ниже</p></legend>


              
                
                    <div class="form-check col-sm-4">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                        <label class="form-check-label" for="gridRadios1">
                            <a  class="popoverClass" data-placement="bottom"  data-toggle="popover" data-img="https://pp.userapi.com/c858128/v858128130/b903/j300OBW5qcU.jpg" title="Пример расположения слева" >С левой стороны</a>
                        </label>
                    </div>
                    <div class="form-check col-sm-4">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                        <label class="form-check-label" for="gridRadios2">
                            <a  class="popoverClass " data-placement="bottom"  data-toggle="popover" data-img="https://pp.userapi.com/c855536/v855536651/8766e/16au3ENVE_Y.jpg" title="Пример расположения снизу" >С нижней стороны</a>
                        </label>
                    </div>
                    <div class="form-check col-sm-4">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3">
                        <label class="form-check-label" for="gridRadios3">
                           <a  class="popoverClass " data-placement="bottom"  data-toggle="popover" data-img="https://pp.userapi.com/c858128/v858128130/b90b/Xfe193ZriQs.jpg" title="Пример расположения справа" >С правой стороны</a>

                        </label>
                    </div>
               
            </div>
        </fieldset>
        <hr class="my-4">
        <div class="date-for-room">
            <h5>Настройка категорий:</h5>
            <p>Выберите картинку для вашей категории:</p>
            <div class="row">

                <div  class="col-md-12 mb-3" style="max-width: 50%">




                        <div class="form-group col-sm-12 ">
                            <label for="exampleFormControlFile1" >Че нить загрузите</label>
                            <input type="file" class="form-control-file file1" id="exampleFormControlFile1" accept="image/jpeg,image/png" name="file">
                        </div>


                </div>
            <div class="col-md-8 mb-3">
                <label for="validationTooltip01">Название категории:</label>
                <input type="text" class="form-control" id="validationTooltip01" placeholder="Животные" name="name" required>


            </div>




            </div>
            <div class="row">
                  <h5 class="col-sm-12" style="padding-bottom: 2%;">Готовые категории, которые вы можете выбрать:</h5>

                <?php
                while($arResult = mysqli_fetch_array($result)) { //mysqli_fetch_array возвращает следующую строчку, пока не достигнет конца результата

                    ?>
                    <div class="card col-sm-3" style="width: 18rem;">
                        <img src="<?php echo "$arResult[2]" ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo "$arResult[1]" ?></h5>


                        </div>
                    </div>
                <?php }?>
            </div>

            <div>
                <button class="btn " type="submit" name="SoDefaultButton" value="VseOk">Подтвердить</button>
            </div>

                </div>
            </div>

            </div>



        </div>

        <hr class="my-4">
</form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover({
            //trigger: 'focus',
            trigger: 'hover',
            html: true,
            content: function () {
                return '<img class="img-fluid" src="'+$(this).data('img') + '" />';
            },
            title: 'Toolbox'
        })
    });
</script>
</body>



</html>