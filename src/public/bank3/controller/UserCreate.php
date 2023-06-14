<?php

class UserCreate {

    private $dataFile;
    
    public function __construct($user) {
        $this->dataFile = $user;
    }
    
    public function writeUser($username, $password) {
        $userData = array(
            'name' => $username,
            'passwd' => md5($password)
        );

        $existingData = [];
        if (file_exists($this->dataFile)) {
            $existingData = json_decode(file_get_contents($this->dataFile), true);
            if ($existingData === null) {
                throw new Exception('Error decoding JSON data.');
            }
        }

        // Append new user data to existing data
        $existingData[] = $userData;
        
        $jsonData = json_encode($existingData);
        if ($jsonData === false) {
            throw new Exception('Error encoding JSON data.');
        }

        if (!is_writable($this->dataFile)) {
            throw new Exception('Data file is not writable.');
        }
        
        $writeData = file_put_contents($this->dataFile, $jsonData);
        if ($writeData === false) {
            throw new Exception('Error writing to data file.');
        }
        
        return true;
    }
}