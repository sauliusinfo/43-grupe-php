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

$clientData = null;
foreach ($data as $item) {
  if ($item['cardID'] === $cardID) {
    $clientData = $item;
    break;
  }
}

if ($clientData === null) {
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="stylesheet" href="../main/w3.css">
        <link rel="stylesheet" href="../main/w3Plus.css">
    </head>
    <body>
    <div class="container">
        <div class="message">
        <h3>Tokio kliento nėra</h3><br>
        <a href="../index.php">[ X ]</a>
        </div>
    </div>
    </body>
    </html>';
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $amount = str_replace(',', '.', $_POST['amount']) ?? 0;

  // tikrinti ar nurasoma suma nevirsija sask. balanso
  if ($amount > $clientData['balance']) {
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="stylesheet" href="../main/w3.css">
        <link rel="stylesheet" href="../main/w3Plus.css">
    </head>
    <body>
    <div class="container">
        <div class="message">
        <h3>Nepakanka lėšų</h3><br>
        <a href="../index.php">[ X ]</a>
        </div>
    </div>
    </body>
    </html>';
    exit;
  }

  // $clientData['balance'] -= $amount;
  $clientData['balance'] = round($clientData['balance'] - $amount, 2);

  foreach ($data as &$item) {
    if ($item['cardID'] === $cardID) {
      $item = $clientData;
      break;
    }
  }
  unset($item);

  $newData = json_encode($data);
  file_put_contents($redirectTo, $newData);

  echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="stylesheet" href="../main/w3.css">
        <link rel="stylesheet" href="../main/w3Plus.css">
    </head>
    <body>
    <div class="container">
        <div class="message">
        <h3>Lėšos sėkmingai nurašytos</h3><br>
        <a href="../index.php">[ X ]</a>
        </div>
    </div>
    </body>
    </html>';
  exit;
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lėšų nurašymas</title>
  <link rel="stylesheet" href="../main/w3.css">
  <link rel="stylesheet" href="../main/w3Plus.css">
</head>
<body style="margin-left: 15px;">
  <h3>Lėšų nurašymas <a href="../index.php">[ X ]</a></h3>

  <form method="POST" action="minusAmount.php?cardID=<?php echo $cardID; ?>">
    <input class="w3-input w3-border w3-margin-bottom" type="text" name="amount" id="amount" placeholder="0.00" required>
    <button class="w3-input w3-block w3-button w3-padding-large w3-red" type="submit">Nurašyti lėšas</button>
  </form>

</body>
</html>
