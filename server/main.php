<?php
function isInFirst($r, $x, $y)
{
    return ($x >= 0 && $y >= 0 && ($x ** 2 + $y ** 2 <= ($r / 2) ** 2));
}

function isInSecond($r, $x, $y)
{
    return ($x <= 0 && $y >= 0 && $x >= -$r / 2 && $y <= $r);
}

function isInFourth($r, $x, $y)
{
    return ($x <= 0 && $y >= 0 && $y >= (-$r + 2 * $r * $x));
}

try {

    $time_start = microtime(true);

    $r = 0;
    $x = 0;
    $y = 0;
    if (isset($_POST["r"])) {

        $r = $_POST["r"];
    }
    if (isset($_POST["x"])) {

        $x = $_POST["x"];
    }
    if (isset($_POST["y"])) {

        $y = $_POST["y"];
    }

    $isInside = (isInFirst($r, $x, $y) || isInSecond($r, $x, $y) || isInFourth($r, $x, $y));
    $isInsideSign = $isInside ? "&#10004": "&#10008";

    $time = new DateTime();
    date_default_timezone_set('Europe/Moscow');
//    $currentTime = date('m/d/Y h:i:s a', time());
    $currentTime = (isset($_POST["currentTime"]) && strlen($_POST["currentTime"]) > 0) ? $_POST["currentTime"] : date('m/d/Y h:i:s a', time());;

    $time_end = microtime(true);
    $scriptWorkTime = $time_end - $time_start;

    $rowsCount = (isset($_COOKIE["rows"]) ? count($_COOKIE["rows"]) : 0);
    $rowName = "r.$rowsCount";



    $array = array("r" => $r, "x" => $x, "y" => $y, "isInside" => $isInsideSign, "currentTime" => $currentTime, "scriptWorkTime" => $scriptWorkTime);
    $serializedArray = serialize($array);
    $key = "rows[$rowName]";
    setcookie($key, $serializedArray);
//    foreach (session_get_cookie_params() as $param){echo $param;};


    /** Создание html кода таблицы и дополнительных данных*/


    $result = "<!DOCTYPE html><html><head>
<link rel='stylesheet' type='text/css' href='styles/table.css'>
<link rel='stylesheet' type='text/css' href='styles/main.css'>
</head><body><div class='container'>";
    $goToMain = "<a href='../client/index.html' class='modern'>Вернуться на главную страницу</a>";
    $result .= $goToMain;

    $table = "<table><thead><tr><th>R</th><th>X</th><th>Y</th><th>Is inside</th><th>Current time</th><th>Script Work Time</th>
</tr></thead><tbody>";
    foreach ($_COOKIE["rows"] as $rowName => $serializedArray) {
        $table .= "<tr>";
        $array = unserialize($serializedArray);
        foreach ($array as $elIndex => $elValue) {
            $table .= "<td>$elValue</td>";
        }
        $table .= "</tr>";
    }
    $table.= "<td>$r</td><td>$x</td><td>$y</td><td>$isInsideSign</td><td>$currentTime</td><td>$scriptWorkTime</td>";

    $table .= "</tbody></table>";

    $result .= $table;
    $result .= "</div></body></html>";

    echo($result);

//    $doc = new DOMDocument();
//    $doc->loadHTML($result);
//    echo $doc->saveHTML();

////    echo($result);
//    $doc = new DOMDocument;
//
//    $newnode = $doc->appendChild(htmlspecialchars_decode($result));


} catch (Error $ex) {
//    echo ("<script>alert($ex)</script>");
    echo("<h1>Incorrect Data</h1>");
}
?>

<!--<!DOCTYPE html>-->
<!--<html lang='ru'>-->
<!--<head>-->
<!--    <meta charset='utf-8'>-->
<!--    <title>Подключение css 3-мя способами!</title>-->
<!--    <link rel="stylesheet" type="text/css" href="styles/table.css">-->
<!--</head>-->
<!---->
<!--<body>-->
<!--    <div>-->
<!--    <table>-->
<!--        <thead>-->
<!--        <tr>-->
<!--            <th>R</th>-->
<!--            <th>X</th>-->
<!--            <th>Y</th>-->
<!--            <th>Is inside</th>-->
<!--            <th>Current time</th>-->
<!--            <th>Script Work Time</th>-->
<!--        </tr>-->
<!--        </thead>-->
<!--        <tbody>-->
<!--        --><?php
//        foreach ($_COOKIE["rows"] as $rowIndex => $array) {
//            echo "<tr>";
//            foreach ($array as $elIndex => $elValue) {
//                echo "<td>$elValue</td>";
//            }
//            echo "</tr>";
//        }
//        ?>
<!--        </tbody>-->
<!--    </table>-->
<!---->
<!--</div>-->
<!--</body>-->
<!--</html>-->


