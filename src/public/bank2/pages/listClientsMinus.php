<?

if(!isset($_SESSION["bank43group"]) || $_SESSION["bank43group"] !== true) {
  header("location: ../index.php");
  exit;
}

$currentDir = __DIR__;
$targetDir = str_replace('/pages', '/', $currentDir);
$redirectTo = $targetDir . 'data/data.json';

$jsonData = file_get_contents($redirectTo);
$data = json_decode($jsonData, 1);

usort($data, function ($a, $b) {
  return strcmp($a['surname'], $b['surname']);
}); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klientai - Atimti</title>
    <link rel="stylesheet" href="../main/w3.css">
    <link rel="stylesheet" href="../main/w3Plus.css">

</head>
<body>

  <h3>Atimti lėšas</h3>

  <table>
    <tr>
      <th>Vardas</th>
      <th>Pavardė</th>
      <th>a. k.</th>
      <th>Sąsk. Nr.</th>
      <th>Balansas</th>
      <th>Veiksmas</th>
    </tr>
    <? foreach ($data as $item): ?>
      <tr>
        <td><? echo $item['name']; ?></td>
        <td><? echo $item['surname']; ?></td>
        <td><? echo $item['cardID']; ?></td>
        <td><? echo $item['accountNr']; ?></td>
        
        <td><? echo number_format($item['balance'], 2) . ' Eur'; ?></td>
        
        <td>
        <? if ($item['balance'] > 0): ?>
          <a href="pages/minusAmount.php?cardID=<? echo $item['cardID']; ?>">Atimti lėšas</a>
        <? else: ?>
          Veiksmas negalimas
        <? endif; ?>
        </td>
      
      </tr>
    <? endforeach; ?>
  </table>

</body>
</html>
