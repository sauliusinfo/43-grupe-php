<?php
  $_ = $_GET['color'] ?? '0';
  //$color = $_ == 1 ? 'red' : 'grey';
  if ($_ == 1) {
    $color = 'red';
  } elseif ($_ == 0) {
    $color = 'grey';
  } else {
    $color = '#'.$_;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB mechanika</title>
</head>
<body style="background-color: <?= $color ?>;">
    <h2>:: WEB mechanika ::</h2>
    <a>1</a><br>
    <a href="http://localhost/007/index.php">Grey</a>
    <a href="http://localhost/007/index.php?color=1">Red</a>
    <br><a>2</a><br>
    <a>Spalvos kodas įrašytas ranka: <?php echo $_ ?></a>
    <br><a>3</a><br>
    <fieldset>
        <legend>GET</legend>
    <form method="get">
        <div>
            <label>Spalvos kodas: </label>
            <input type="text" name="color">
        </div>
        <div>
            <button type="submit">Keisti</button>
        </div>
    </form>
    </fieldset>
</body>
</html>