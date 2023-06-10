<?php

class Kibiras1 {
    
    protected $akmenuKiekis = 0;
    private static $akmenuKiekisVisuoseKibiruose;

    public function prideti1Akmeni() : int
    {
        return $this->akmenuKiekis += 1;
    }

    public function pridetiDaugAkmenu($kiekis) : int
    {
        return $this->akmenuKiekis += $kiekis;
    }

    public function kiekPririnktaAkmenu() : int
    {
        return $this->akmenuKiekis;
    }

    public function akmenuKiekisVisuoseKibiruose() {
        return self::$akmenuKiekisVisuoseKibiruose;
    }
}
