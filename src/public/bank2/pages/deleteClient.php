<? session_start();

if (!isset($_SESSION["bank43group"]) || $_SESSION["bank43group"] !== true) {
  header("location: ../index.php");
  exit;
}

$currentDir = __DIR__;
$targetDir = str_replace('/pages', '/', $currentDir);
$redirectTo = $targetDir . 'data/data.json';

$jsonData = file_get_contents($redirectTo);
$data = json_decode($jsonData, true);

$cardID = $_GET['cardID'] ?? '';

$index = null;
foreach ($data as $key => $item) {
  if ($item['cardID'] === $cardID) {
    $index = $key;
    break;
  }
}

if ($index !== null) {
  // trinu elementa is masyvo
  array_splice($data, $index, 1);

  $jsonData = json_encode($data, 1);

  file_put_contents($redirectTo, $jsonData);
} else {
  // msg ir arba redirectas
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naikinti</title>
    <link rel="stylesheet" href="../main/w3.css">
    <link rel="stylesheet" href="../main/w3Plus.css">
</head>
<body>

<div class="container">
    <div class="message">
        <? echo '<h3>Kliento duomenys sėkmingai pašalinti</h3><br>'?>
        <a href="../index.php">[ X ]</a>
    </div>
</div>

</body>
</html>
