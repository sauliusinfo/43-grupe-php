<?php

namespace Bank3\Controllers;

use Bank3\App;

class HomeController
{
  public function index()
  {
    return App::view('home/index', ['pageTitle' => 'Home Page']);
  }
}