<?php echo

'<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stringai (movie edition)</title>
</head>
<body><h2>:: Stringai (movie edition) ::</h2>';
// -->

/* */
echo '1. 2. 3. 4. <br>';
$vardas = ''; $pavarde = '';
function tekstoIlgis ($vardas, $pavarde) {
    $rezultatas1 = strlen($vardas) > strlen($pavarde) ? $pavarde : $vardas;
    return $rezultatas1;
}
function tekstoTiuningas1 ($vardas, $pavarde) {
    $tekstasUp = strtoupper($vardas);
    $tekstasLo = strtolower($pavarde);
    return $tekstasUp . ' ' . $tekstasLo;
}
function tekstoTiuningas2 ($vardas, $pavarde) {
    $inicialai = substr($vardas, 0, 1) . '.' . substr($pavarde, 0, 1) . '.';
    return $inicialai;
}
function tekstoTiuningas3 ($vardas, $pavarde) {
    $rezultatas3 = substr($vardas, -3) . substr($pavarde, -3);
    return $rezultatas3;
}
$vardas = 'Tadas'; $pavarde = 'Blinda';
$rezultatas1 = tekstoIlgis($vardas, $pavarde);
$rezultatas2 = tekstoTiuningas1($vardas, $pavarde);
$inicialai = tekstoTiuningas2($vardas, $pavarde);
$rezultatas3 = tekstoTiuningas3($vardas, $pavarde);
echo 'Aš esu '.$vardas.' '.$pavarde.'. Trumpesnis tekstas yra: '.$rezultatas1.'<br>';
echo 'Aš esu '.$vardas.' '.$pavarde.'. Teksto tiuningas: '.$rezultatas2.'<br>';
echo 'Aš esu '.$vardas.' '.$pavarde.'. Inicialai: '.$inicialai.'<br>';
echo 'Aš esu '.$vardas.' '.$pavarde.'. Sudurtinis tekstas: '.$rezultatas3.'<br>';
/* */
echo '5. <br>';
$tekstas = 'An American in Paris';
$pakeistasTekstas = str_replace(['a', 'A'], '*', $tekstas);
echo $pakeistasTekstas.'<br>';
/* */

// <--
echo
'</body>
</html>';
