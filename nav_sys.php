<?php
//if($handle = opendir(".")) {
//    while (($item = readdir($handle)) !== false) {
//        echo $item . "<br>";
//    }
//}
//?>

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
            $directory = ".";
            function dirMake($var){

                   $handle = opendir($var);
                    while (($element = readdir($handle))){
                        if($element != "." && $element != '..'){

                            $size = filesize($element);
                            $type = filetype($element);
                            $filetime = date('d.m.Y.',filectime($element));
                            $filemodify = date('d.m.Y.', fileatime($element));

                            if(filetype($element) == 'dir'){
                                echo "<td> <img src ='92.jpg' height='20px' width='30px'> $element</td> ";
                            } else
                                echo "<td> <img src ='93.jpg' height='25px' width='30px'> $element</td> ";

                            echo "<td>$type</td>";
                            echo "<td>$size Байт</td>";
                            echo "<td>$filetime</td>";
                            echo "<td>$filemodify</td>";
                            echo "</tr>";
                        }
                    }closedir($handle);
            }

            dirMake($directory);




//            if ($handle = opendir('.')) {
//                $count = 0;
//                while (false !== ($entry = readdir($handle))) {
//                    if ($entry != "." && $entry != "..") {
//                                $count++;
//                                $size = filesize($entry);
//                                $type = filetype($entry);
//                                $filetime = date('d.m.Y.', filectime($entry));
//                                $filemodify = date('d.m.Y.', fileatime($entry));
//                                echo "<tr>";
//                                if (filetype($entry) == 'dir') {
//                                    echo "<td> <img src ='92.jpg' height='20px' width='30px'> $entry</td> ";
//                                } else
//                                    echo "<td> <img src ='93.jpg' height='25px' width='30px'> $entry</td> ";
//
//                                echo "<td>$type</td>";
//                                echo "<td>$size Байт</td>";
//                                echo "<td>$filetime</td>";
//                                echo "<td>$filemodify</td>";
//                                if (filetype($entry) == 'dir') {
//                                    echo "<td><a href='?var=$entry' >Открыть</a></td>";
//                                } else
//                                    echo "</tr>";
//
//                            }
//                        }
//                        closedir($handle);
//                }
            ?>
        </table>
    </div>

</body>
</html>
