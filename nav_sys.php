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
                <td> Объект</td> <td>Тип</td> <td>Размер</td> <td></td>
            </tr>
            <?php
            if ($handle = opendir('.')) {
                $count =0;
                while (false !== ($entry = readdir($handle))) {
                    if ($entry != "." && $entry != "..") {
                        $count++;
                        $size = filesize($entry);
                        $type = filetype($entry);
                        echo "<tr><td>$entry</td> ";
                        echo "<td>$type</td>";
                        echo "<td>$size Байт</td>";
                        echo "</tr>";

                    }
                }
                closedir($handle);
            }

            ?>
        </table>
    </div>

</body>
</html>
