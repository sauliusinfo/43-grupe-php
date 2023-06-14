<?php

class UserLogin {

    public function checkSession() : void
    {
        if (isset($_SESSION['name']) && !isset($_GET['logout'])) {
            header('Location: ./bank3/');
            die;
        }
    }
    
    public function logout() : void
    {
        if (isset($_GET['logout'])) {
            unset($_SESSION['name']);
            $this->setMsg('Logged out');
            header('Location: ./bank3/index.php');
            die;
        }
    }

    public function login() : void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $users = file_get_contents(__DIR__ . '../../storage/users.json');
            $users = json_decode($users, 1);
            
            foreach($users as $user) {
                if ($user['name'] == $_POST['name'] && $user['passwd'] == md5($_POST['passwd'])) {
                    $_SESSION['name'] = $user['name'];
                    header('Location: ./bank3/public/home.php');
                    die;
                }
            }
            $this->setMsg('Invalid password or username');
            header('Location: ./bank3/index.php');
            die;
        }
    }

    public function setMsg(string $msg) : void
    {
        $_SESSION['msg'] = $msg;
    }
    
    public function displayMsg() : void
    {
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    }
}