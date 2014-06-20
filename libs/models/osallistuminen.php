<?php


class osallistuminen {

    private $id;
    private $tapahtumaid;
    private $fuksiid;
    private $pisteet;
    private $tutorid;

    public function __construct($tapahtumaid, $fuksiid, $pisteet) {
        $this->tapahtumaid = $tapahtumaid;
        $this->fuksiid = $fuksiid;
        $this->pisteet = $pisteet;
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

    public function lisaaAlustavaOsallistuminenKantaan() {
        $sql = "INSERT INTO osallistuminen(otunnus, tapahtumatunnus, fuksitunnus, pisteet) VALUES(nextval('osallistuminen_id_seq'),?,?,?) RETURNING otunnus";
        $kysely = getTietokantayhteys()->prepare($sql);

        $ok = $kysely->execute(array($this->getTapahtumaid(), $this->getFuksiid(), $this->getPisteet()));
        if ($ok) {
            //Haetaan RETURNING-määreen palauttama id.
            //HUOM! Tämä toimii ainoastaan PostgreSQL-kannalla!
            $this->id = $kysely->fetchColumn();
        }
        return $this->id;
    }
    
        public static function onkoOsallistunut($fuksiID, $tapahtumaID) {

        $sql = "SELECT otunnus FROM osallistuminen WHERE fuksitunnus = ? and tapahtumatunnus = ? LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($fuksiID, $tapahtumaID));

        $tulos = $kysely->fetchObject();
        
        if ($tulos==null){
            return false;
        } else {
            return true;
        }
    }
    
    

}
