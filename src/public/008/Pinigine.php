<?php

class Pinigine {
    
    private $popieriniaiPinigai = 0;
    private $metaliniaiPinigai = 0;

    public function ideti($kiekis) : int
    {
        if ($kiekis <= 2) {
            $this->metaliniaiPinigai += $kiekis;
        } else {
            $this->popieriniaiPinigai += $kiekis;
        }
        return $kiekis;
    }

    public function skaiciuoti() : void
    {
        echo "Popieriniai pinigai: " . $this->popieriniaiPinigai . PHP_EOL;
        echo "Metaliniai pinigai: " . $this->metaliniaiPinigai . PHP_EOL;
    }
}