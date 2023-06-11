<?php

class MyUser
{
    public $userName;
    private $userEmail; // private or protected(lower)

    public function __construct($enterUser, $enterEmail)
    {
        $this->userName = $enterUser;
        $this->userEmail = $enterEmail;
    }

    public function getEmail() : void
    {
        echo $this->userEmail;
    }
}
