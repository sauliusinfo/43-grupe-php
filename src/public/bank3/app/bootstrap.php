<?php

use Bank3\App;

session_start();

require __DIR__ . '/../vendor/autoload.php';

echo App::start();
