<?php
  $color = $_GET['color']  ?? 'grey';

  if (preg_match('/^[0-9a-f]{6}$/', $color)) {
    $color = '#' . $color;
    } elseif ($color == 1) {
      $color = 'crimson';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB mechanika</title>
    <style>
      body {
        background-color: <?= $color ?>;
      }
      a {
        display: inline-block;
        color: skyblue;
        padding: 2px;
      }
    </style>
</head>
<body>
    <h2>:: WEB mechanika ::</h2>
    <b>1</b><br>
    <a href="http://localhost/007/index.php">Grey</a>
    <a href="http://localhost/007/index.php?color=1">Red</a>
    <br><b>2</b><br>
    <b>Spalvos kodas įrašytas ranka: <?php echo $color ?></b>
    <br><b>3</b><br>
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
    <br><b>4</b><br>
    <br><b>5</b><br>
</body>
</html>
