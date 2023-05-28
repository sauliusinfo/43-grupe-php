<?php echo

'<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kintamieji ir sąlygos</title>
</head>
<body><h2>:: Kintamieji ir sąlygos ::</h2>';

/** */
echo '1. <br>';
$vardas = 'Vardenis'; $pavarde = 'Pavardenis'; $gimimoMetai = 0; $dabarMetai = 0;
function matematika1 ($gimimoMetai, $dabarMetai) {
    $amzius = $dabarMetai - $gimimoMetai;
    return $amzius;
}
$rezultatas = matematika1(1990, 2023);
echo 'Aš esu '.$vardas.' '.$pavarde.'. Man yra '.$rezultatas.' metai(ų).<br>';
/** */
echo '2. <br>';
$kint1 = 0; $kint2 = 0;
function matematika2 ($kint1, $kint2) {
    if ($kint1 > $kint2) {
        $skaicius = $kint2 != 0 ? $kint1 / $kint2 : 'Dalyba iš 0 negalima!';
    } else {
        $skaicius = $kint1 != 0 ? $kint2 / $kint1 : 'Dalyba iš 0 negalima!';
    }
    return $skaicius;
}
$kint1 = rand(0, 4);
$kint2 = rand(0, 4);
$rezultatas = matematika2($kint1, $kint2);
echo 'kint1: '.$kint1.'<br>kint2: '.$kint2.'<br>rezultatas: '.$rezultatas.'<br>';
/** */
echo '3. <br>';
$sk1 = 0; $sk2 = 0; $sk3 = 0;
function matematika3 ($sk1, $sk2, $sk3) {
    if (($sk3 < $sk1 && $sk1 < $sk2) || ($sk3 > $sk1 && $sk1 > $sk2)) {
        $rezultatas = $sk1;
    } else if (($sk1 < $sk2 && $sk2 < $sk3) || ($sk1 > $sk2 && $sk2 > $sk3)) {
        $rezultatas = $sk2;
    } else if (($sk2 < $sk3 && $sk3 < $sk1) || ($sk2 > $sk3 && $sk3 > $sk1)) {
        $rezultatas = $sk3;
    } else {
        $rezultatas = 'Nėra kintamojo, turinčio vidurinę reikšmę.';
    }
    return $rezultatas;
}
$sk1 = rand(0, 25); $sk2 = rand(0, 25); $sk3 =rand(0, 25);
$rezultatas = matematika3($sk1, $sk2, $sk3);
echo 'sk1: '.$sk1.'<br>sk2: '.$sk2.'<br>sk3: '.$sk3.'<br>rezultatas: '.$rezultatas;
/** */

echo
'</body>
</html>';
