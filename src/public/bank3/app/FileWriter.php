<?php

namespace Bank3;

use App\DB\DataBase;

class FileWriter implements DataBase {

  private $data, $fileName;
    
  public function __construct($fileName)
  {
    $this->fileName = $fileName;
    if (!file_exists(__DIR__ . '/../data/' . $fileName . '.json')) {
      $this->data = [];
    } else {
      $this->data = json_decode(file_get_contents(__DIR__ . '/../data/' . $fileName . '.json'), 1);
    }
  }
  
  public function __destruct()
  {
    $this->data = array_values($this->data);
    file_put_contents(__DIR__ . '/../data/' . $this->fileName . '.json', json_encode($this->data));
  }
  
  public function create(array $accData) : void
  {
    // if (strlen($accData['name']) <= 3 || strlen($accData['surname']) <= 3) {
    //   echo "<script>alert('Invalid name or surname. Must be more than 3 letters.');</script>";
    //   return;
    // } else {
      $id = rand(100000000, 999999999);
      $accData['id'] = $id;
      $amount = 0;
      $accData['amount'] = $amount;
      $this->data[] = $accData;
    // }
  }
  
  public function update(int $accId, array $accData) : void
  {
    foreach ($this->data as $key => $acc) {
      if ($acc['id'] == $accId) {
        $accData['id'] = $accId; // for safety
        $this->data[$key] = $accData;
      }
    }
  }
  
  public function delete(int $accId) : void
  {
    foreach ($this->data as $key => $acc) {
      if ($acc['id'] == $accId) {
        unset($this->data[$key]);
      }
    }
  }

  public function show(int $accId) : array
  {
    foreach ($this->data as $key => $acc) {
      if ($acc['id'] == $accId) {
        return $this->data[$key];
      }
    }
  }
  
  public function showAll() : array
  {
    return $this->data;
  }
}