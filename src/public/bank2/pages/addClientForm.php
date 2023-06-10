<?
if(!isset($_SESSION["bank43group"]) || $_SESSION["bank43group"] !== true) {
  header("location: ../index.php");
  exit;
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Naujas Klientas</title>
  <link rel="stylesheet" href="../main/w3.css">
  <link rel="stylesheet" href="../main/w3Plus.css">
</head>
<body>

  <h3>Sukurti naują klientą</h3>

  <form method="POST" action="./pages/addClient.php">  
    <input class="w3-input w3-border w3-margin-bottom" 
      type="text" name="name" id="name" placeholder="Vardas" required >
    <input class="w3-input w3-border w3-margin-bottom" 
      type="text" name="surname" id="surname" placeholder="Pavardė" required >
    <input class="w3-input w3-border w3-margin-bottom" 
      type="text" name="cardID" id="cardID" placeholder="a./k." required >
    <input class="w3-input w3-border w3-margin-bottom" 
      type="text" name="accountNr" id="accountNr" placeholder="Banko sąskaitos nr." required >
    <input class="w3-input w3-border w3-margin-bottom" 
      type="number" name="balance" id="balance" value="0" readonly>

    <input class="w3-input w3-block w3-button w3-padding-large w3-blue-grey" type="submit" value="Išsaugoti">
  </form>

</body>
</html>