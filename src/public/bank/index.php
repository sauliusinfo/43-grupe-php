<? session_start();

if(isset($_SESSION['bank43group']) && $_SESSION['bank43group'] === true) {
  header('location: bank.php');
  exit;
}

$id = ""; $pass = "";

if(isset($_REQUEST["i"])) {
  $id = $_REQUEST["i"];
}

if(isset($_REQUEST["p"])) {
  $pass = $_REQUEST["p"];
}

if($id === 'labas' && $pass === 'asbankas') {
  $_SESSION['bank43group'] = true; header('LOCATION: bank.php'); exit;
}
else {
  echo 'Neteisingi prisijungimo duomenys';
}
