<?php

// Sumodeliuokite vinies kalimą. Įkalimo gylį sumodeliuokite pasinaudodami rand() funkcija. Vinies ilgis 8.5cm (pilnai sulenda į lentą).
// “Įkalkite” 5 vinis mažais smūgiais. Vienas smūgis vinį įkala 5-20 mm. Suskaičiuokite kiek reikia smūgių.
// “Įkalkite” 5 vinis dideliais smūgiais. Vienas smūgis vinį įkala 20-30 mm, bet yra 50% tikimybė (pasinaudokite rand() 
// funkcija tikimybei sumodeliuoti), kad smūgis nepataikys į vinį. Suskaičiuokite kiek reikia smūgių.

$vinies_ilgis = 8.5; // cm
$smugiu_sk = 0;

while ($vinies_ilgis > 0) {
    $smugio_dydis = mt_rand(5, 20) / 10; // cm
    echo '<br>smugio dydis: '.$smugio_dydis; // galima uzkomentuoti arba ne
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
