<?php

echo '<pre>';

// 1 task
echo '<div>1</div>';

require __DIR__ . '/Kibiras1.php';

$kibiras = new Kibiras1;

var_dump($kibiras);

$kibiras->prideti1Akmeni(1);
var_dump($kibiras);

$kibiras->pridetiDaugAkmenu(20);
var_dump($kibiras);

$kiekisKibire = $kibiras->kiekPririnktaAkmenu();
var_dump($kibiras);

echo 'is viso ' . $kiekisKibire;

// 2 task
echo '<div>2</div>';

require __DIR__ . '/Pinigine.php';

$pinigine = new Pinigine;

$pinigine->ideti(2); 
$pinigine->ideti(5);

$pinigine->skaiciuoti();

// 3 task
echo '<div>3</div>';

