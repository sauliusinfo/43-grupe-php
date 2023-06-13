<?php

class Kibiras3 extends Kibiras1 {

    public function __construct($kiekis)
    {
        $this->akmenuKiekis = $kiekis;        
    }

    public function prideti1Akmeni(): int
    {
        return $this->akmenuKiekis;
    }
}
