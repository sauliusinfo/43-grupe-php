<?php

namespace Bank3;

use App\DB\DataBase;
use PDO;

class DatabaseWriter implements DataBase {

  private $tableName, $pdo;
    
  public function __construct($tableName)
  {
    $this->tableName = $tableName;

    $host = 'mysql';
    $db = '43php';
    $user = 'root';
    $pass = 'S3qJbrM8+';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES   => false
    ];

    $this->pdo = new PDO($dsn, $user, $pass, $options);
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
    $sql =
    "
    INSERT INTO {$this->tableName}
    (
      `name`,
      `surname`,
      `card-id`,
      `account-nr`,
      `amount`
    )
    VALUES
    (
      ?, ?, ?, ?, ?
    )
    ";

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
      $accData['name'],
      $accData['surname'],
      $accData['card-id'],
      $accData['account-nr'] = DatabaseWriter::generateIban(),
      $accData['amount'] = 0
    ]);
  }
  
  public function update(int $accId, array $accData) : void
  {
    $sql =
    "
    UPDATE {$this->tableName}
    SET
    `name` = ?,
    `surname` = ?,
    `card-id` = ?,
    `amount` = ?
    WHERE `id` = ?
    ";

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
      $accData['name'],
      $accData['surname'],
      $accData['card-id'],
      $accData['amount'],
      $accId
    ]);
  }
  
  public function delete(int $accId) : void
  {
    $sql =
    "
    DELETE FROM {$this->tableName}
    WHERE `id` = ?
    ";

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$accId]);
  }

  public function show(int $accId) : array
  {
    $sql =
    "SELECT *
    FROM {$this->tableName}
    WHERE `id` = ?
    ";

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$accId]);

    return $stmt->fetch();
  }
  
  public function showAll() : array
  {
    $sql =
    "
    SELECT *
    FROM {$this->tableName}
    ";

    $stmt = $this->pdo->query($sql);

    return $stmt->fetchAll();
  }
}