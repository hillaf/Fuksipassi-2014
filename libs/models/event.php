<?php

class event {

    private $id;
    private $nimi;
    private $paikka;
    private $pvm;
    private $aika;
    private $linkki;
    private $pisteet;
    private $kuvaus;

    public function __construct($id, $nimi, $paikka, $pvm, $aika, $linkki, $pisteet, $kuvaus) {
        $this->id = $id;
        $this->nimi = $nimi;
        $this->paikka = $paikka;
        $this->pvm = $pvm;
        $this->aika = $aika;
        $this->linkki = $linkki;
        $this->pisteet = $pisteet;
        $this->kuvaus = $kuvaus;
    }

    public function getId() {
        return $this->id;
    }

    public function getNimi() {
        return $this->nimi;
    }

    public function getPaikka() {
        return $this->paikka;
    }

    public function getPvm() {
        return $this->pvm;
    }

    public function getAika() {
        return $this->aika;
    }

    public function getLinkki() {
        return $this->linkki;
    }

    public function getPisteet() {
        return $this->pisteet;
    }

    public function getKuvaus() {
        return $this->kuvaus;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNimi($nimi) {
        $this->nimi = $nimi;
    }

    public function setPaikka($paikka) {
        $this->paikka = $paikka;
    }

    public function setPvm($pvm) {
        $this->pvm = $pvm;
    }

        public function setAika($aika) {
        $this->aika = $aika;
    }

    public function setLinkki($linkki) {
        $this->linkki = $linkki;
    }

    public function setPisteet($pisteet) {
        $this->pisteet = $pisteet;
    }
    
    public function setKuvaus($kuvaus){
        $this->kuvaus = $kuvaus;
    }
}
