<?php

namespace Bank3\Controllers;

use Bank3\OldData;
use Bank3\App;
use Bank3\FileWriter;
use Bank3\Messages;

class LoginController {

  public function index()
  {
    $old = OldData::getFlashData();
      
    return App::view('auth/index', [
            'pageTitle' => 'Login',
            'inLogin' => true,
            'old' => $old
          ]);
  }

  public function login(array $data)
  {
    $username = $data['name'] ?? '';
    $password = $data['password'] ?? '';
    
    $user = App::get('users')->getUserByEmailAndPass($username, $password);
    if ($user) {
      $_SESSION['name'] = $username;

      Messages::addMessage('success', 'You are logged in');
      header('Location: /');
      die;
    } else {
      Messages::addMessage('danger', 'Wrong email or password');
      OldData::flashData($data);
      header('Location: /login');
      die;
    }
  }

  public function logout()
  {
    // unset($_SESSION['email']);
    unset($_SESSION['name']);
    
    Messages::addMessage('success', 'You are logged out');
    header('Location: /');
    exit;
  }
}