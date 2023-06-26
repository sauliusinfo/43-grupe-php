<?php

$accounts = [
  [
    'name' => 'Petras',
    'surname' => 'Petraitis',
    'card-id' => '38010100123',
    'account-nr' => 'LT227180300000345097',
    'amount' => '0',
    'id' => '784111449'
  ],
  [
    'name' => 'Jonas',
    'surname' => 'Jonaitis',
    'card-id' => '38010100195',
    'account-nr' => 'LT227180300000345000',
    'amount' => '0',
    'id' => '784100449'
  ],
  [
    'name' => 'Vardenis',
    'surname' => 'Pavardenis',
    'card-id' => '38010100761',
    'account-nr' => 'LT227180300000345080',
    'amount' => '0',
    'id' => '700111449'
  ],
  [
    'name' => 'Jonas',
    'surname' => 'Antaras',
    'card-id' => '38010100352',
    'account-nr' => 'LT227180300000345088',
    'amount' => '0',
    'id' => '784113339'
  ],
  [
    'name' => 'Matas',
    'surname' => 'Mataitis',
    'card-id' => '38010100456',
    'account-nr' => 'LT227180300000345099',
    'amount' => '0',
    'id' => '784777449'
  ]
];

file_put_contents(__DIR__ . '/bank.json', json_encode($accounts));

echo "\n bank.json created \n";