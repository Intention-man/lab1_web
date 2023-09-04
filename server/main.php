<?php session_start();
function isInFirst($r, $x, $y) {
    return ($x >= 0 && $y >= 0 && ($x**2 + $y**2 <= ($r / 2) ** 2));
}

function isInSecond($r, $x, $y) {
    return ($x <= 0 && $y >= 0 && $x >= -$r/2 && $y <= $r);
}

function isInFourth($r, $x, $y) {
    return ($x <= 0 && $y >= 0 && $y >= (-$r + 2 * $r * $x));
}

error_reporting(0);

try {
    $time_start = microtime(true);

    $r = 0;
    $x = 0;
    $y = 0;
    if(isset($_POST["r"])){

        $r = $_POST["r"];
    }
    if(isset($_POST["x"])){

        $x = $_POST["x"];
    }
    if(isset($_POST["y"])){

        $y = $_POST["y"];
    }

    $isInside = (isInFirst($r, $x, $y) || isInSecond($r, $x, $y) || isInFourth($r, $x, $y));


    date_default_timezone_set('Europe/Moscow');
    $currentTime = date('m/d/Y h:i:s a', time());

//    echo $currentTime;
    $time_end = microtime(true);
    $scriptWorkTime = $time_end - $time_start;

    $rowsCount = ($_SESSION["rows"] != null ? count($_SESSION["rows"]) : 0);

    $_SESSION = array();
    $_SESSION["rows"]["r.$rowsCount"]['r'] = $r;
    $_SESSION["rows"]["r.$rowsCount"]['x'] = $x;
    $_SESSION["rows"]["r.$rowsCount"]['y'] = $y;
    $_SESSION["rows"]["r.$rowsCount"]['isInside'] = $isInside;
    $_SESSION["rows"]["r.$rowsCount"]['currentTime'] = $currentTime;
    $_SESSION["rows"]["r.$rowsCount"]['scriptWorkTime'] = $scriptWorkTime;
//    echo $_SESSION["rows[r.$rowsCount]['r']"];


    /** Создание html кода таблицы и дополнительных данных*/
    $result = "<div>";

    $table = "<table><thead><tr><th>R</th><th>X</th><th>Y</th><th>Is inside</th><th>Current time</th><th>Script Work Time</th>
</tr></thead><tbody>";
    foreach ($_SESSION["rows"] as $rowIndex => $array){
        $table .= "<tr>";
        foreach ($array as $elIndex => $elValue){
            $table.= "<td>$elValue</td>";
        }
        $table.= "</tr>";
    }
    $table .= "</tbody></table>";

    $result .= $table;

    $result .= "</div>";

    header('Content-Type: application/html');
    echo json_encode($response);

    echo $result;
} catch (Error $ex){
    echo ($ex);
}

?>