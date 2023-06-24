<?php

namespace Bank3;
use Bank3\Controllers\HomeController;
use Bank3\Controllers\BankController;

class App {

  static public function start()
  {
    $url = explode('/', $_SERVER['REQUEST_URI']);
    array_shift($url);
    return self::router($url);
  }

  static public function router($url)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && count($url) == 1 && $url[0] == '') {
      return (new HomeController)->index();
    }

    // var_dump($url);

    // Login
    // if ($_SERVER['REQUEST_METHOD'] == 'GET' && count($url) == 1 && $url[0] == 'login') {
    //   return (new LoginController)->index();
    // }
    // if ($_SERVER['REQUEST_METHOD'] == 'POST' && count($url) == 1 && $url[0] == 'login') {
    //     return (new LoginController)->login($_POST);
    // }
    // if ($_SERVER['REQUEST_METHOD'] == 'GET' && count($url) == 1 && $url[0] == 'logout') {
    //     return (new LoginController)->logout();
    // }

    // Auth middleware
    // if (!isset($_SESSION['email'])) {
    //     header('Location: /login');
    //     die;
    // }
    // Auth middleware END

    // Bank
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && count($url) == 2 && $url[0] == 'bank') {
      return (new BankController)->index();
    }
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && count($url) == 3 && $url[0] == 'bank' && $url[1] == 'create') {
      return (new BankController)->create();
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && count($url) == 2 && $url[0] == 'bank' && $url[1] == 'store') {
      return (new BankController)->store($_POST);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && count($url) == 3 && $url[0] == 'bank' && $url[1] == 'edit') {
      return (new BankController)->edit($url[2]);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && count($url) == 3 && $url[0] == 'bank' && $url[1] == 'update') {
      return (new BankController)->update($url[2], $_POST);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && count($url) == 3 && $url[0] == 'bank' && $url[1] == 'delete') {
      return (new BankController)->delete($url[2]);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && count($url) == 3 && $url[0] == 'bank' && $url[1] == 'destroy') {
      return (new BankController)->destroy($url[2]);
    }
    // Bank end

    {
      return self::view('404', [
        'pageTitle' => 'Page Not Found 404',
      ]);
    }
  }

  static public function view($path, $data = null)
    {
        if ($data) {
            extract($data);
        }

        ob_start();

        require __DIR__ . '/../views/top.php';
        require __DIR__ . '/../views/' . $path . '.php';
        require __DIR__ . '/../views/bottom.php';

        return ob_get_clean();
    }
}