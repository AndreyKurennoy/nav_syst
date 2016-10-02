<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<div class="container">
    <table class="table table-hover">
        <tr>
            <td> Объект</td> <td>Тип</td> <td>Размер</td> <td>Дата создания</td> <td>Дата модификации</td> <td>Манипуляции</td>
        </tr>



<?php
$var = isset($_GET['var']) ? './' . $_GET['var'] : '.';

function dirMake($var)                          //Создаю функцию отображения интерфейса файлового менеджера
{                                               // с переходом в другие директивы
    $handle = opendir( $var);
    while (($element = readdir($handle))){
        if($element != ".") {

            $size = filesize($var . '/' .$element);
            $type = filetype($var . '/' .$element);
            $filetime = date('d.m.Y.', filectime($var . '/' .$element));
            $filemodify = date('d.m.Y.', fileatime($var . '/' .$element));

            if (filetype($var . '/' .$element) == 'dir') {
                echo "<td> <img src ='92.jpg' height='20px' width='30px'> $element</td> ";
            } else
                echo "<td> <img src ='93.jpg' height='25px' width='30px'> $element</td> ";

            echo "<td>$type</td>";
            echo "<td>$size Байт</td>";
            echo "<td>$filetime</td>";
            echo "<td>$filemodify</td>";

            if (is_dir($var . '/' .$element)) {
                echo "<td>
                            <a href='nav_sys1.php?var=$var/$element'>Открыть |</a>
                            <a href='nav_sys1.php?var=$var/$element'>Удалить</a>
                    </td>";

            }

            if (is_file($var . '/' . $element)){
                echo "<td>
                <a href='nav_sys1.php?read=$var/$element'>Просмотр |</a>
                <a href='nav_sys1.php?mod=$var/$element'>Редактирование</a>
                </td>";
            }
            echo "</tr>";

        }
    }closedir($handle);
}

dirMake($var);                  //вызываю функцию повторно при открытии другой директории


$read = isset($_GET['read']) ?  $_GET['read'] : 0;
//echo $read;

@$lines = count(file($read));
//echo $lines;

function fileRead($text)                                                //Функция чтения текстовых файлов
{
    if($text !== 0){
        $info = new SplFileInfo($text);
        if($info->getExtension() != 'jpg' ){
            echo file_get_contents($text);
        }
                else
        {
            echo "<img src =\"$text\" width='70px' height='95px'  class=\"img-responsive center-block\">";
                                                                    //Прсто выводит этот текст в textarea, как исправить?
        }
    }
//
}



$mod = isset($_GET['mod']) ? $_GET['mod'] : 0;
//        echo $mod;
$var_mod = isset($_POST['textblock1']) ? $_POST['textblock1'] :0;
function fileMod($text, $var1=0)                                                        //Функция редактирования текстовіх файлов
{
    if($text !== 0){
        $info = new SplFileInfo($text);
        if($info->getExtension() != 'jpg' ){
            echo file_get_contents($text);
//            if($var1 !== 0) {                                       // Просто удаляет содержимое файла и не перезаписівает
//                $f = fopen($text, "w");                               //Как реализовать????
//// Записать текст
//                fwrite($f, $_POST["textblock1"]);
//// Закрыть текстовый файл
//                fclose($f);
//            }
        }

    } else
        exit;
}

?>
    </table>
</div>







<div class="container">
    <form method="post">
    <textarea name="textblock1" class="form-control" rows="15" >
        <?php
        fileRead($read);                                                    //Вызываю функциии чтения или редактирования
        fileMod($mod);
        ?>

    </textarea>
    <button type="submit" name="q1" class="btn btn-lg btn-primary"
        <?php if ($mod = 0){                                                    //Кнопка отображается только для режима редактирования
           echo 'disabled ="disabled"';}
           else {echo "";}
           ?>>
        Сохранить изменения</button>
</form>
</div>


</body>
</html>