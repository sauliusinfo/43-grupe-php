<?php

session_start()

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./app.css">
    <script type="text/javascript" src="./app.js"></script>
</head>
<body>
    <header class=""><?php require __DIR__ . '/hero.php'; ?></header>

<!-- TOP SECTION -->
<section>
  <div class="container-fluid hero d-flex flex-column justify-content-between align-items-center py-3" id="home">
    <h3 class="text-light text-center mt-5">Clients, Accounts, More..</h3>
    
    <table class="table table-dark table-sm table-transparent">
        <thead>
            <tr>
                <th>NR</th>
                <th>NAME</th>
                <th>SURNAME</th>
                <th>CARD ID</th>
                <th>ACCOUNT NR</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1.</td>
                <td>Petras</td>
                <td>Petraitis</td>
                <td>30012000849</td>
                <td>LT1234567890123456789</td>
                <td><button type="button" class="btn btn-outline-success">+</button></td>
                <td><button type="button" class="btn btn-outline-danger">-</button></td>
                <td><button type="button" class="btn btn-outline-danger delete"></button></td>
            </tr>
        </tbody>
    </table>
    
    <button type="button" class="btn btn-outline-secondary">Support</i></button>
  </div>
</section>

<!-- FOOTER  -->
<!-- <section>
  <div class="container-fluid bg-dark text-light text-center p-5">
    <h3>SM Bankas &copy;</h3>
    <a href="#home" type="button" class="btn btn-secondary">Back to top</a>
  </div>
</section> -->

</body>
</html>