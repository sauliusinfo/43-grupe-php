<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $pageTitle ?? 'Untitled' ?></title>
  <link rel="stylesheet" href="<?= URL ?>/app.css">
  <script type="text/javascript" src="<?= URL ?>/app.js" defer></script>
</head>
<body>

<?php if(!isset($inLogin)) : ?>
<?php require __DIR__ . '/nav.php' ?>
<?php endif ?>

<?php require_once __DIR__ . '/message.php' ?>