<? session_start();

if(!isset($_SESSION["bank43group"]) || $_SESSION["bank43group"] !== true) {
    header("location: ../index.php");
    exit;
}
// asmens kodo tikrinimas
function validateAsmensKodas($asmensKodas) {
    if (!preg_match('/^\d{11}$/', $asmensKodas)) {
        return false;
    }
    $skaitmenys = str_split($asmensKodas);
    $kontrolinisSkaitmuo = (int)$skaitmenys[10];
    
    $skaiciai = array_map('intval', str_split($asmensKodas, 1));
    
    $svarba = [1, 2, 3, 4, 5, 6, 7, 8, 9, 1];
    $suma = 0;
    
    for ($i = 0; $i < 10; $i++) {
        $suma += $svarba[$i] * $skaiciai[$i];
    }
    
    $liekana = $suma % 11;
    
    if ($liekana === 10) {
        $liekana = 0;
    }
    
    if ($liekana !== $kontrolinisSkaitmuo) {
        return false;
    }

    return true;
}

// IBAN Lietuva tikrinimas
function checkIBAN($iban) {
    if(strlen($iban) < 5) return false;
    $iban = strtolower(str_replace(' ','',$iban));
    $Countries = array('al'=>28,'ad'=>24,'at'=>20,'az'=>28,'bh'=>22,'be'=>16,'ba'=>20,'br'=>29,'bg'=>22,'cr'=>21,'hr'=>21,'cy'=>28,'cz'=>24,'dk'=>18,'do'=>28,'ee'=>20,'fo'=>18,'fi'=>18,'fr'=>27,'ge'=>22,'de'=>22,'gi'=>23,'gr'=>27,'gl'=>18,'gt'=>28,'hu'=>28,'is'=>26,'ie'=>22,'il'=>23,'it'=>27,'jo'=>30,'kz'=>20,'kw'=>30,'lv'=>21,'lb'=>28,'li'=>21,'lt'=>20,'lu'=>20,'mk'=>19,'mt'=>31,'mr'=>27,'mu'=>30,'mc'=>27,'md'=>24,'me'=>22,'nl'=>18,'no'=>15,'pk'=>24,'ps'=>29,'pl'=>28,'pt'=>25,'qa'=>29,'ro'=>24,'sm'=>27,'sa'=>24,'rs'=>22,'sk'=>24,'si'=>19,'es'=>24,'se'=>24,'ch'=>21,'tn'=>24,'tr'=>26,'ae'=>23,'gb'=>22,'vg'=>24);
    $Chars = array('a'=>10,'b'=>11,'c'=>12,'d'=>13,'e'=>14,'f'=>15,'g'=>16,'h'=>17,'i'=>18,'j'=>19,'k'=>20,'l'=>21,'m'=>22,'n'=>23,'o'=>24,'p'=>25,'q'=>26,'r'=>27,'s'=>28,'t'=>29,'u'=>30,'v'=>31,'w'=>32,'x'=>33,'y'=>34,'z'=>35);

    if(array_key_exists(substr($iban,0,2), $Countries) && strlen($iban) == $Countries[substr($iban,0,2)]){
                
        $MovedChar = substr($iban, 4).substr($iban,0,4);
        $MovedCharArray = str_split($MovedChar);
        $NewString = "";

        foreach($MovedCharArray AS $key => $value){
            if(!is_numeric($MovedCharArray[$key])){
                if(!isset($Chars[$MovedCharArray[$key]])) return false;
                $MovedCharArray[$key] = $Chars[$MovedCharArray[$key]];
            }
            $NewString .= $MovedCharArray[$key];
        }
        
        if(bcmod($NewString, '97') == 1)
        {
            return true;
        }
    }
    return false;
}

$name = $_POST['name'];
$surname = $_POST['surname'];
$cardID = $_POST['cardID'];
$accountNr = $_POST['accountNr'];
$balance = $_POST['balance'];

if (strlen($name) <= 3 || strlen($surname) <= 3) {
    echo '<script>alert("Vardas arba Pavardė turi būti ilgesni nei 3 simboliai");</script>';
    echo '<script>window.location.href = "../index.php";</script>';
    exit;
}

$asmensKodas = $cardID;
if (!validateAsmensKodas($asmensKodas)) {
    echo '<script>alert("Neteisingas asmens kodas");</script>';
    echo '<script>window.location.href = "../index.php";</script>';
    exit;
}

$iban = $accountNr;
if (!checkIBAN($iban)) {
    echo '<script>alert("Neteisinga banko sąskaita");</script>';
    echo '<script>window.location.href = "../index.php";</script>';
    exit;
}

$data = [
    'name' => $name,
    'surname' => $surname,
    'cardID' => $cardID,
    'accountNr' => $accountNr,
    'balance' => $balance
];

$currentDir = __DIR__;
$targetDir = str_replace('/pages', '/', $currentDir);
$redirectTo = $targetDir . 'data/data.json';

$existingData = file_get_contents($redirectTo);

$existingArray = json_decode($existingData, true);

// a.k. ar egzistuoja toks
foreach ($existingArray as $existingData) {
    if ($existingData['cardID'] === $cardID) {
        echo '<script>alert("Duomenys su tokiu a.k. jau egzistuoja");</script>';
        echo '<script>window.location.href = "../index.php";</script>';
        exit;
    }
}

$existingArray[] = $data;

$jsonData = json_encode($existingArray, 1);

file_put_contents($redirectTo, $jsonData); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klientas</title>
    <link rel="stylesheet" href="../main/w3.css">
    <link rel="stylesheet" href="../main/w3Plus.css">
</head>
<body>

<div class="container">
    <div class="message">
        <? echo '<h3>Kliento duomenys sėkmingai išsaugoti</h3><br>'
        .$name.' '.$surname.'<br>'
        .'a.k. / ' .$cardID.'<br>'
        .'Sąsk. Nr. / ' .$accountNr.'<br><br>';?>
        <a href="../index.php">[ X ]</a>
    </div>
</div>

</body>
</html>
