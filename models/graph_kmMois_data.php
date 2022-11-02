<?php 
require_once('connect.php');
$keys = array('JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC');
$values = array();
for ($i = 1; $i < 13; $i++) {
    $sqlDistance = 'SELECT ROUND(SUM(distance)) FROM courses where date_part(\'month\', date) =' . $i . '';
    foreach ($pdo->query($sqlDistance) as $row) {
        if ($row['round'] == '') {
            $d = 0;
        } else {
            $d = $row['round'] / 1000;
        }
        array_push($values, $d);
    }
}
$a = array_combine($keys, $values);
//print(json_encode($a));
$i = 0;
$b = array();
foreach ($keys as $k) {
    $b[$i] = array("periode" => $k, "km" => $values[$i]);
    $i++;
}

print(json_encode($b));

?>