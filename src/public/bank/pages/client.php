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
  // msg rodyti arba redirectint 
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kliento duomenys</title>
  <link rel="stylesheet" href="../main/w3.css">
    <link rel="stylesheet" href="../main/w3Plus.css">
</head>

<body style="margin-left: 15px;">
  <h3>Klientas / <? echo $clientData['name'] . ' ' . $clientData['surname']; ?>
  <a href="../index.php">[ X ]</a></h3>

  <table>
    <tr>
      <th>Vardas</th>
      <th>Pavardė</th>
      <th>a.k.</th>
      <th>Sąsk. Nr.</th>
      <th>Blansas</th>
      <th>Pridėti</th>
      <th>Atimti</th>
      <th>Ištrinti</th>
    </tr>
    <tr>
      <td><? echo $clientData['name']; ?></td>
      <td><? echo $clientData['surname']; ?></td>
      <td><? echo $clientData['cardID']; ?></td>
      <td><? echo $clientData['accountNr']; ?></td>
      <td><? echo number_format($clientData['balance'], 2) . ' Eur'; ?></td>

      <td><a href="addAmount.php?cardID=<? echo $clientData['cardID']; ?>">Pridėti lėšas</a></td>
      
      <td>
        <? if ($clientData['balance'] > 0): ?>
          <a href="minusAmount.php?cardID=<? echo $clientData['cardID']; ?>">Atimti lėšas</a>
        <? else: ?>
          Veiksmas negalimas
        <? endif; ?>
      </td>
      
      <td>
        <? if ($clientData['balance'] == 0): ?>
          <a href="deleteClient.php?cardID=<? echo $clientData['cardID']; ?>">Naikinti</a>
        <? else: ?>
          Veiksmas negalimas
        <? endif; ?>
      </td>

    </tr>
  </table>
</body>

</html>
