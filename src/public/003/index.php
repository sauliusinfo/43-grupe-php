<?php
echo
'<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciklai</title>
</head>
<body><h2>:: Ciklai ::</h2>';

/** */
echo '10. <br>';
$vinies_ilgis = 8.5; // cm
$smugiu_sk = 0;
while ($vinies_ilgis > 0) {
    $smugio_dydis = mt_rand(5, 20) / 10; // cm
    echo 'smugio dydis: '.$smugio_dydis; // galima uzkomentuoti arba ne
    $vinies_ilgis -= $smugio_dydis;
    echo '<br>vinies ilgis: '.$vinies_ilgis; // galima uzkomentuoti arba ne
    $smugiu_sk++;
}
echo "\n <br>Mažais smūgiais reikės $smugiu_sk smūgių.";
$vinies_ilgis = 8.5; // cm
$smugiu_sk = 0;
while ($vinies_ilgis > 0) {
    if (mt_rand(0, 1) == 0) { // 50% tikimybe (0 or 1)
        $smugio_dydis = mt_rand(20, 30) / 10; // cm
        echo '<br>smugio dydis: '.$smugio_dydis; // galima uzkomentuoti arba ne
        $vinies_ilgis -= $smugio_dydis;
        echo '<br>vinies ilgis: '.$vinies_ilgis; // galima uzkomentuoti arba ne
        $smugiu_sk++;
    } else {
        $smugiu_sk++;
    }
}
echo "<br> Dideliais smūgiais reikės $smugiu_sk smūgių.";
/** */

echo
'</body>
</html>';
