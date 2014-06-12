<?php

class fuksi {

    private $id;
    private $nimi;
    private $irc;
    private $email;

    public function __construct($id, $nimi, $irc, $email) {
        $this->id = $id;
        $this->nimi = $nimi;
        $this->irc = $irc;
        $this->email = $email;
    }

    public function getId() {
        return $this->id;
    }

    public function getNimi() {
        return $this->nimi;
    }

    public function getIrc() {
        return $this->irc;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNimi($nimi) {
        $this->nimi = $nimi;
    }

    public function setIrc($irc) {
        $this->irc = $irc;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public static function etsiKaikkiFuksit() {

        $sql = "SELECT * FROM fuksi";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();

        $tulokset = array();

        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $fuksi = new fuksi($tulos->fuksitunnus, $tulos->nimi, $tulos->ircnick, $tulos->email);

            $tulokset[] = $fuksi;
        }

        return $tulokset;
    }

    public static function etsiFuksi($id) {

        $param = array();
        $id = (int) $id;
        $param[] = $id;
        $sql = "SELECT fuksitunnus, nimi, ircnick, email FROM fuksi WHERE fuksitunnus = ? LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute($param);

        $tulokset = array();

        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $fuksi = new fuksi($tulos->fuksitunnus, $tulos->nimi, $tulos->ircnick, $tulos->email);

            $tulokset[] = $fuksi;
        }

        return $tulokset;
    }

    public function poistaFuksi($id) {
        $param = array();
        $id = (int) $id;
        $param[] = $id;
        $sql = "DELETE FROM fuksi WHERE fuksitunnus = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute($param);
    }

    public function lisaaKantaan() {
        $sql = "INSERT INTO fuksi(fuksitunnus, nimi, ircnick, email) VALUES(?,?,?,?) RETURNING fuksitunnus";
        $kysely = getTietokantayhteys()->prepare($sql);

        $ok = $kysely->execute(array($this->getId(), $this->getNimi(), $this->getIrc(), $this->getEmail()));
        if ($ok) {
            //Haetaan RETURNING-määreen palauttama id.
            //HUOM! Tämä toimii ainoastaan PostgreSQL-kannalla!
            $this->id = $kysely->fetchColumn();
        }
        return $ok;
    }

    public function onkoKelvollinen() {
        if (trim($this->nimi) == '') {
            $this->virheet['nimi'] = "Nimi ei saa olla tyhjä.";
        } else {
            unset($this->virheet['nimi']);
        }

        if (trim($this->irc) == '') {
            $this->virheet['irc'] = "Ircnick ei saa olla tyhjä.";
        } else {
            unset($this->virheet['irc']);
        }

        if (trim($this->email) == '') {
            $this->virheet['email'] = "Email ei saa olla tyhjä.";
        } else {
            unset($this->virheet['email']);
        }

        if (!is_numeric($this->id)) {
            $this->virheet['id'] = "Fuksitunnuksen tulee olla numero.";
        } else if ($this->id <= 0) {
            $this->virheet['id'] = "Fuksitunnuksen täytyy olla positiivinen.";
        } else {
            unset($this->virheet['id']);
        }

        return empty($this->virheet);
    }

    public function getVirheet() {
        return $this->virheet;
    }

    public function getPoistoVirheet() {
        return $this->poistovirheet;
    }

}
