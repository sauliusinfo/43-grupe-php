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
    
    $users = (new FileWriter('users'))->showAll();

    foreach ($users as $user) {
      if ($user['name'] == $username && $user['password'] == md5($password)) 
      {
        $_SESSION['name'] = $username;
        // $_SESSION['email'] = $user['email'];
        
        Messages::addMessage('success', 'You are logged in');
        header('Location: /');
        die;
      }
    }

    Messages::addMessage('danger', 'Wrong email or password');
    OldData::flashData($data);
    header('Location: /login');
    die;
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