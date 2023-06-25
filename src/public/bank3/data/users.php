<?php

$users = [
  ['name' => '', 'password' => ''],
  ['name' => 'test@test.test', 'password' => md5('123')],
  ['name' => 'info@info.info', 'password' => md5('123')],
  ['name' => 'tv@tv.tv', 'password' => md5('123')],
  ['name' => 'demo@demo.demo', 'password' => md5('123')]
];

file_put_contents(__DIR__ . '/users.json', json_encode($users));

echo "\n users.json created \n";