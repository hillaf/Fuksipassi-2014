<?php

class user {

    private $virheet;
    private $id;
    private $tunnus;
    private $salasana;
    private $salasana2;
    private $fuksitunnus;
    private $tutortunnus;

    public function __construct($tunnus, $salasana, $salasana2) {
        $this->tunnus = $tunnus;
        $this->salasana = $salasana;
        $this->salasana2 = $salasana2;
        $this->virheet = array();
    }

    public function getId() {
        return $this->id;
    }

    public function getTunnus() {
        return $this->tunnus;
    }

    public function getSalasana() {
        return $this->salasana;
    }

    public function getSalasana2() {
        return $this->salasana2;
    }

    public function getFuksitunnus() {
        return $this->fuksitunnus;
    }

    public function getTutortunnus() {
        return $this->tutortunnus;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setTunnus($tunnus) {
        $this->tunnus = $tunnus;
    }

    public function setSalasana($salasana) {
        $this->salasana = $salasana;
    }

    public function setSalasana2($salasana2) {;
        $this->salasana2 = $salasana2;
        
    }

    public function setFuksitunnus($ftunnus) {
        $this->fuksitunnus = $ftunnus;
    }

    public function setTutortunnus($ttunnus) {
        $this->tutortunnus = $ttunnus;
    }

    public static function etsiKayttajaTunnuksilla($kayttaja, $salasana) {
        $sql = "SELECT * from users where tunnus = ? LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql);
        
        
        $kysely->execute(array($kayttaja));
        $tulos = $kysely->fetchObject();
        
        $password_verify = (crypt($salasana, $tulos->password) == $tulos->password);
        
        if ($tulos == null || $password_verify == false) {
            return null;
        } else {
            $kayttaja = new user($tulos->tunnus, $tulos->password, $tulos->password);
            $kayttaja->setId($tulos->id);
            $kayttaja->setFuksitunnus($tulos->fuksitunnus);
            $kayttaja->setTutortunnus($tulos->tutortunnus);
            return $kayttaja;
        }
    }

    public function lisaaKantaan($foreignid) {
        $sql = "INSERT INTO users(id, tunnus, password, fuksitunnus) VALUES(nextval('user_id_seq'),?,?,?) RETURNING id";
        $kysely = getTietokantayhteys()->prepare($sql);

        $password = crypt($this->getSalasana());
        $ok = $kysely->execute(array($this->getTunnus(), $password, $foreignid));
        if ($ok) {
            //Haetaan RETURNING-määreen palauttama id.
            //HUOM! Tämä toimii ainoastaan PostgreSQL-kannalla!
            $this->id = $kysely->fetchColumn();
        }
        return $ok;
    }

    public function getVirheet() {
        return $this->virheet;
    }

    public function onkoKelvollinen() {


        $this->onkoLiianPitkaTaiTyhja($this->tunnus, 'Käyttäjätunnus');
        $this->onkoLiianPitkaTaiTyhja($this->salasana, 'Salasana');

        if (strcmp(trim($this->salasana), trim($this->salasana2)) !== 0) {
            $this->virheet['SalasanatMismatch'] = "Salasanat eivät täsmänneet. Huomioithan isot ja pienet kirjaimet.";
        } else {
            unset($this->virheet['SalasanatMismatch']);
        }

        return empty($this->virheet);
    }

    function onkoLiianPitkaTaiTyhja($param, $tyyppi) {
        if (strlen(trim($param)) > 50) {
            $this->virheet[$tyyppi] = "$tyyppi ei saa olla yli 50 merkkiä pitkä.";
        } else if (trim($param) == '') {
            $this->virheet[$tyyppi] = "$tyyppi ei saa olla tyhjä.";
        } else {
            unset($this->virheet[$tyyppi]);
        }
    }

}
