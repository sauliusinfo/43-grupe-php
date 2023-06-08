<?php

class Kibiras1 {
    
    protected $akmenuKiekis = 0;

    public function prideti1Akmeni() : int
    {
        return $this->akmenuKiekis++;
    }

    public function pridetiDaugAkmenu($kiekis) :int
    {
        return $this->akmenuKiekis += $kiekis;
    }

    public function kiekPririnktaAkmenu() : int
    {
        return $this->akmenuKiekis;
    }
}
