<?php

class osallistuminen {

    private $id;
    private $tapahtumaid;
    private $fuksiid;
    private $pisteet;
    private $tutoriid;

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
        return $this->tutoriid;
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

    public function vahvistaOsallistuminen($tutortunnus) {
        $sql = "UPDATE osallistuminen SET tutortunnus = ? WHERE otunnus = ? RETURNING otunnus";
        $kysely = getTietokantayhteys()->prepare($sql);

        $ok = $kysely->execute(array($tutortunnus, $this->id));
        if ($ok) {
            //Haetaan RETURNING-määreen palauttama id.
            //HUOM! Tämä toimii ainoastaan PostgreSQL-kannalla!
            $this->id = $kysely->fetchColumn();
        }
        return $this->id;
    }

    public function poistaOsallistuminen() {

        $sql = "DELETE FROM osallistuminen WHERE otunnus = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($this->id));
    }

    public static function etsiOsallistuminen($fuksiID, $tapahtumaID) {

        $sql = "SELECT * FROM osallistuminen WHERE fuksitunnus = ? and tapahtumatunnus = ? LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($fuksiID, $tapahtumaID));

        $tulos = $kysely->fetchObject();
        
        $osallistuminen = new osallistuminen($tulos->tapahtumatunnus, $tulos->fuksitunnus, $tulos->pisteet);
        $osallistuminen->setId($tulos->otunnus);

        return $osallistuminen;
    }
    
    public static function onkoOsallistunut($fuksiID, $tapahtumaID) {

        $sql = "SELECT otunnus FROM osallistuminen WHERE fuksitunnus = ? and tapahtumatunnus = ? LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($fuksiID, $tapahtumaID));

        $tulos = $kysely->fetchObject();

        if ($tulos == null){
            return false;
        } else {
            return true;
        }
        
    }

    public static function etsiVahvistamattomiaOsallistumisiaSisaltavatTapahtumat() {

        $sql = "SELECT DISTINCT tapahtumatunnus FROM osallistuminen WHERE tutortunnus is null";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();
        
        $tulokset = array();

        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $tulokset[] = $tulos->tapahtumatunnus;
        }

        return $tulokset;
    }
    
    public static function etsiOsallistumisetTapahtumasta($tapahtumaid) {

        $sql = "SELECT * FROM osallistuminen WHERE tapahtumatunnus = ? ORDER BY fuksitunnus";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($tapahtumaid));
        
        $tulokset = array();

        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            
            $osallistuminen = new osallistuminen($tulos->tapahtumatunnus, $tulos->fuksitunnus, $tulos->pisteet);
            $osallistuminen->setTutoriid($tulos->tutortunnus);
            $tulokset[] = $osallistuminen;
        }

        return $tulokset;
    }
    
    public static function etsiFuksinOsallistututTapahtumat($fuksiid) {

        $sql = "SELECT tapahtumatunnus FROM osallistuminen WHERE fuksitunnus = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($fuksiid));
        
        $tulokset = array();

        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $tulokset[] = $tulos->tapahtumatunnus;
        }

        return $tulokset;
    }
    
}
