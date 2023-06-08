<?php echo '<div>1</div>';

echo '<pre>';

require __DIR__ . '/Kibiras1.php';

$kibiras = new Kibiras1();

var_dump($kibiras);

$kibiras->prideti1Akmeni(1);
var_dump($kibiras);

$kibiras->pridetiDaugAkmenu(20);
var_dump($kibiras);

$kiekisKibire = $kibiras->kiekPririnktaAkmenu();
var_dump($kibiras);

echo 'is viso ' . $kiekisKibire;
