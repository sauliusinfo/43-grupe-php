<?php
echo '<pre>';

// 1 task
echo '<div>1</div>';

require __DIR__ . '/Kibiras1.php';

$kibiras = new Kibiras1;

$kibiras->prideti1Akmeni();
$kibiras->prideti1Akmeni();

$kibiras->pridetiDaugAkmenu(5);
$kibiras->pridetiDaugAkmenu(10);

echo 'is viso ' . $kiekisKibire = $kibiras->kiekPririnktaAkmenu() . PHP_EOL . PHP_EOL;


// 2 task
echo '<div>2</div>';

require __DIR__ . '/Pinigine.php';

$pinigine = new Pinigine;

$pinigine->ideti(2); 
$pinigine->ideti(5);

$pinigine->skaiciuoti();


// 3 task
echo '<div>3</div>';

