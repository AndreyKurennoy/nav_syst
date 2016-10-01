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
 $var = isset($_GET['var']) ? $_GET['var'] : '.';

function dirMake($var)
{
    $ex = '/';
    $handle = opendir('.' . $ex . $var);
    while (($element = readdir($handle))){
        if($element != "." && $element != '..') {

            $size = filesize($element);
            $type = filetype($element);
            $filetime = date('d.m.Y.', filectime($element));
            $filemodify = date('d.m.Y.', fileatime($element));

            if (filetype($element) == 'dir') {
                echo "<td> <img src ='92.jpg' height='20px' width='30px'> $element</td> ";
            } else
                echo "<td> <img src ='93.jpg' height='25px' width='30px'> $element</td> ";

            echo "<td>$type</td>";
            echo "<td>$size Байт</td>";
            echo "<td>$filetime</td>";
            echo "<td>$filemodify</td>";

            if (is_dir($element)) {
                echo "<td><a href='nav_sys1.php?var=$element'>Открыть</a></td>";

            }
            echo "</tr>";

        }
    }closedir($handle);
}

dirMake($var);

?>
    </table>
</div>

</body>
</html>