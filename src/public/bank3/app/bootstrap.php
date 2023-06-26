<?php

use Bank3\App;

session_start();

define('URL', 'http://localhost/');

require __DIR__ . '/../vendor/autoload.php';

echo App::start();
