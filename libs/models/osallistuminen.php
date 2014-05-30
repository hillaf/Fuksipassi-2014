<?php

class osallistuminen {

    private $id;
    private $tapahtumaid;
    private $fuksiid;
    private $pisteet;
    private $tutorid;

    public function __construct($id, $tapahtumaid, $fuksiid, $pisteet, $tutorid) {
        $this->id = $id;
        $this->tapahtumaid = $tapahtumaid;
        $this->fuksiid = $fuksiid;
        $this->pisteet = $pisteet;
        $this->tutorid = $tutorid;
    }

    public function getId() {
        return $this->id;
    }

    public function getTapahtumaid() {
        return $this->tapahtumaid;
    }

    public function getFuksiid() {
        return $this->fuksiid;
    }

    public function getPisteet() {
        return $this->pisteet;
    }

    public function getTutoriid() {
        return $this->tutorid;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setTapahtumaid($tapahtumaid) {
        $this->tapahtumaid = $tapahtumaid;
    }

    public function setFuksiid($fuksiid) {
        $this->fuksiid = $fuksiid;
    }

    public function setPiste($pisteet) {
        $this->pisteet = $pisteet;
    }

    public function setTutoriid($tutoriid) {
        $this->tutoriid = $tutoriid;
    }

}
