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
  
  public static function generateIban()
  {
    $bankAccountNumber = sprintf('%016d', mt_rand(0, 99999999999999));
    $countryCode = 'LT';
    $iban = $countryCode . '00' . $bankAccountNumber;
    $ibanDigits = str_split($iban);
    $checksum = 0;
    foreach ($ibanDigits as $digit) {
        $checksum = ($checksum * 10 + intval($digit)) % 97;
    }
    $checksumDigits = sprintf('%02d', 98 - $checksum);
    $iban = substr_replace($iban, $checksumDigits, 2, 2);

    return $iban;
  }

  public function create(array $accData) : void
  {
    $id = rand(100000000, 999999999);
    $accData['id'] = $id;
    $accData['account-nr'] = FileWriter::generateIban(); 
    $accData['amount'] = 0;
    $this->data[] = $accData;
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

  public function getUserByEmailAndPass(): ?array
  {
    $users = (new FileWriter('users'))->showAll();
    
    foreach ($users as $user) {
      return $user;
    }
  }
}