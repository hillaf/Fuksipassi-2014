<?php

class fuksi {

    private $virheet = array();
    private $id;
    private $nimi;
    private $irc;
    private $email;

    public function __construct($nimi, $irc, $email) {
        $this->nimi = $nimi;
        $this->irc = $irc;
        $this->email = $email;
        $this->id = '';
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

        $sql = "SELECT * FROM fuksi ORDER BY nimi";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();

        $tulokset = array();

        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $fuksi = new fuksi($tulos->nimi, $tulos->ircnick, $tulos->email);
            $fuksi->setId($tulos->fuksitunnus);

            $tulokset[] = $fuksi;
        }

        return $tulokset;
    }

    public static function etsiFuksi($id) {

        
        $sql = "SELECT fuksitunnus, nimi, ircnick, email FROM fuksi WHERE fuksitunnus = ? LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($id));


        $tulos = $kysely->fetchObject();
        $fuksi = new fuksi($tulos->nimi, $tulos->ircnick, $tulos->email);
        $fuksi->setId($id);

        return $fuksi;
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
        $sql = "INSERT INTO fuksi(fuksitunnus, nimi, ircnick, email) VALUES(nextval('fuksi_id_seq'),?,?,?) RETURNING fuksitunnus";
        $kysely = getTietokantayhteys()->prepare($sql);

        $ok = $kysely->execute(array($this->getNimi(), $this->getIrc(), $this->getEmail()));
        if ($ok) {
            //Haetaan RETURNING-määreen palauttama id.
            //HUOM! Tämä toimii ainoastaan PostgreSQL-kannalla!
            $this->id = $kysely->fetchColumn();
        }
        return $this->id;
    }

    public function paivitaKantaan() {
        $sql = "UPDATE fuksi SET nimi = ?, ircnick = ?, email = ? WHERE fuksitunnus = ? RETURNING fuksitunnus";
        $kysely = getTietokantayhteys()->prepare($sql);

        $ok = $kysely->execute(array($this->getNimi(), $this->getIrc(), $this->getEmail(), $this->getId()));
        if ($ok) {
            //Haetaan RETURNING-määreen palauttama id.
            //HUOM! Tämä toimii ainoastaan PostgreSQL-kannalla!
            $this->id = $kysely->fetchColumn();
        }
        return $this->id;
    }

    // palauttaa listana niiden tapahtumien id:t, joihin fuksi on osallistunut

    public static function etsiFuksinTapahtumat($fuksiID) {


        $sql = "SELECT tapahtumatunnus FROM osallistuminen WHERE fuksitunnus = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($fuksiID));

        $tulokset = array();

        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $tulokset[] = $tulos->tapahtumatunnus;
        }

        return $tulokset;
    }

    public function getPisteet() {
        $sql = "SELECT SUM(pisteet) FROM osallistuminen WHERE fuksitunnus = ?";
        $kysely = getTietokantayhteys()->prepare($sql);

        $ok = $kysely->execute(array($this->getId()));
        $tulos = $kysely->fetchColumn();

        if ($tulos == null) {
            $tulos = 0;
        }

        return $tulos;
    }

    public function onkoKelvollinen() {


        $this->onkoLiianPitkaTaiTyhja($this->nimi, 'Nimi');
        $this->onkoLiianPitkaTaiTyhja($this->irc, 'Ircnick');
        $this->onkoLiianPitkaTaiTyhja($this->email, 'Email');

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

    public function getVirheet() {
        return $this->virheet;
    }

    public function getPoistoVirheet() {
        return $this->poistovirheet;
    }

}
