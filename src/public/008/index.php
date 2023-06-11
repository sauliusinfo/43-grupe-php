<?php

echo '<pre>';

// 0 task
require __DIR__ . '/MyUser.php';

echo '<div>0</div>';

$userOne = new MyUser('Jonas', 'jonas@serveriai.lt');
echo $userOne->userName . " :: ";
$userOne->getEmail(); echo PHP_EOL;

$userTwo = new MyUser('Petras', 'petras@serveriai.lt');
echo $userTwo->userName . " :: ";
$userTwo->getEmail(); echo PHP_EOL;


// 1 task
require __DIR__ . '/Kibiras1.php';

echo '<div>1</div>';

$kibiras = new Kibiras1();

$kibiras->prideti1Akmeni();
$kibiras->prideti1Akmeni();

$kibiras->pridetiDaugAkmenu(5);
$kibiras->pridetiDaugAkmenu(10);

echo 'objekto klase - ' . get_class($kibiras) . PHP_EOL;
echo 'savybes - '; print_r(get_class_vars('Kibiras1'));
echo 'metodai - '; print_r(get_class_methods('Kibiras1'));

echo 'is viso pririnkom akmenu ' . $kibiras->kiekPririnktaAkmenu() . PHP_EOL;
echo PHP_EOL;


// 2 task
require __DIR__ . '/Pinigine.php';

echo '<div>2</div>';

$pinigine = new Pinigine();

$pinigine->ideti(2); 
$pinigine->ideti(5);
$pinigine->ideti(3);

$pinigine->skaiciuoti();


// 3 task
echo '<div>3</div>';
