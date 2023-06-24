<?php

session_start();

require __DIR__ . '../../controller/UserCreate.php';

$dataFile = '../storage/users.json';

$userWriter = new UserCreate($dataFile);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['name'];
  $password = $_POST['passwd'];

  try {
    $userWriter = new UserCreate($dataFile);
    $userWriter->writeUser($username, $password);
    // echo 'User data has been written to data.json successfully.';
    header('location: ../index.php');
    exit;
  } catch (Exception $e) {
      echo 'Error: ' . $e->getMessage();
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./app.css">
    <script type="text/javascript" src="./app.js"></script>
</head>
<body>

<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">

    <div class="text-white-50">
      <?php $userWriter->displayMsg(); ?>
    </div>
    
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
              <h2 class="fw-bold mb-2 text-uppercase">b&b</h2>
              <p class="text-white-50 mb-5">:: Black Bank ::</p>
              <form method="POST">
                <div class="form-outline form-white mb-4">
                  <input type="email" id="email" class="form-control form-control-lg" name="name" />
                  <label class="form-label" for="email">Email</label>
                </div>
                <div class="form-outline form-white mb-4">
                  <input type="password" id="passwd" class="form-control form-control-lg" name="passwd" />
                  <label class="form-label" for="passwd">Password</label>
                </div>
                <!-- <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p> -->
                <button class="btn btn-outline-light btn-lg px-5" type="submit">Register</button>
              </form>
            </div>

            <div>
              <p class="mb-0">
                Already registered? <a href="../index.php" class="text-white-50 fw-bold">Login</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>