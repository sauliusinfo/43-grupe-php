<? session_start();

if(!isset($_SESSION["bank43group"]) || $_SESSION["bank43group"] !== true) {
    header("location: index.php");
    exit;
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saulės miesto bankas</title>
    <link rel="stylesheet" href="./main/w3.css">
    <link rel="stylesheet" href="./main/w3Plus.css">
</head>
<body>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-top w3-small w3-padding w3-light-grey" style="z-index:3;width:200px;" id="mySidebar">
    <div class="w3-bar-block">
        <h6 class="fade-in">:: SM Bankas ::</h6>
    </div>
    <div class="w3-bar-block">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <button type="submit" name="useButton" value="listClients" 
            class="w3-button w3-block w3-padding-large w3-blue w3-margin-top">Klientai</button></form></div>
    <div class="w3-bar-block">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <button type="submit" name="useButton" value="addAmount" 
            class="w3-button w3-block w3-padding-large w3-green w3-margin-top">Pridėti lėšas</button></form></div>
    <div class="w3-bar-block">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <button type="submit" name="useButton" value="minusAmount" 
        class="w3-button w3-block w3-padding-large w3-red w3-margin-top">Atimti lėšas</button></form></div>
    <div class="w3-bar-block">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <button type="submit" name="useButton" value="newClient" 
        class="w3-button w3-block w3-padding-large w3-blue-grey w3-margin-top">Naujas Klientas</button></form></div></nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-hide-large w3-large w3-padding">
    <a href="javascript:void(0)" class="w3-button w3-blue w3-margin-right" onclick="w3_open()">
        <svg width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 15 15">
        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 
                1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" /></svg></a></header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:200px;margin-right:20px">

<!-- Display page data -->
<div class="w3-container w3-small w3-hoverable" style="margin-top:5px">

<?
if (isset($_POST['useButton'])) {
    switch ($_POST['useButton']) {
        case 'listClients':
            require_once __DIR__ . '/pages/listClients.php';
            break;
        case 'addAmount':
            require_once __DIR__ . '/pages/listClientsAdd.php';
            break;
        case 'minusAmount':
            require_once __DIR__ . '/pages/listClientsMinus.php';
            break;
        case 'newClient':
            require_once __DIR__ . '/pages/addClientForm.php';
            break;
    }
} else {
    require_once __DIR__ . '/pages/listClients.php';
} ?>

</div></div>

<script type="text/javascript" src="./main/w3.js" defer></script>
</body>
</html>