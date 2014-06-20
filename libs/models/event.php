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

    public function __construct($nimi, $paikka, $pvm, $aika, $linkki, $pisteet, $kuvaus) {
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

    public function setKuvaus($kuvaus) {
        $this->kuvaus = $kuvaus;
    }

    public static function etsiKaikkiTapahtumat() {

        $sql = "SELECT * FROM tapahtuma ORDER BY pvm DESC";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute();

        $tulokset = array();

        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $event = new event($tulos->nimi, $tulos->paikka, $tulos->pvm, $tulos->aika, $tulos->linkki, $tulos->pisteet, $tulos->kuvaus);
            $event->setId($tulos->tapahtumatunnus);
            
            $tulokset[] = $event;
        }

        return $tulokset;
    }

    public static function etsiTapahtuma($id) {

        $param = array();
        $id = (int) $id;
        $param[] = $id;
        $sql = "SELECT tapahtumatunnus, nimi, paikka, pvm, aika, linkki, pisteet, kuvaus FROM tapahtuma WHERE tapahtumatunnus = ? LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute($param);

        $tulokset = array();

        foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
            $tapahtuma = new event($tulos->nimi, $tulos->paikka, $tulos->pvm, $tulos->aika, $tulos->linkki, $tulos->pisteet, $tulos->kuvaus);
            $tapahtuma->setId($tulos->tapahtumatunnus);
            
            $tulokset[] = $tapahtuma;
        }

        return $tulokset;
    }
    
 

    public function onkoKelvollinen() {

        $this->onkoLiianPitkaTaiTyhja($this->nimi, 'Nimi');
        $this->onkoLiianPitkaTaiTyhja($this->paikka, 'Paikka');
        $this->onkoLiianPitkaTaiTyhja($this->pvm, 'Päivämäärä');
        $this->onkoLiianPitkaTaiTyhja($this->aika, 'Aika');
        $this->onkoLiianPitkaTaiTyhja($this->linkki, 'Linkki');
        $this->onkoLiianPitkaTaiTyhja($this->pisteet, 'Pisteet');
        $this->onkoKuvausLiianPitkaTaiTyhja($this->kuvaus, 'Kuvaus');
        
        if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $this->pvm)){
            $this->virheet['Pvmmuoto'] = "Annanthan päivämäärän muodossa yyyy-mm-dd.";
        } else {
            unset($this->virheet['Pvmmuoto']);
        }
        
        if (!preg_match("/(\d{2}):(\d{2})/", $this->aika)){
            $this->virheet['Aikamuoto'] = "Annanthan ajan muodossa hh:mm.";
        } else {
            unset($this->virheet['Aikamuoto']);
        }

        
        if (!is_numeric($this->pisteet)) {
            $this->virheet['Pisteetlukuna'] = "Pisteet tulee ilmoittaa kokonaislukuna.";
        } else {
            unset($this->virheet['Pisteetlukuna']);
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
    
    function onkoKuvausLiianPitkaTaiTyhja($param, $tyyppi) {
        if (strlen(trim($param)) > 500) {
            $this->virheet[$tyyppi] = "$tyyppi ei saa olla yli 50 merkkiä pitkä.";
        } else if (trim($param) == '') {
            $this->virheet[$tyyppi] = "$tyyppi ei saa olla tyhjä.";
        } else {
            unset($this->virheet[$tyyppi]);
        }
    }

    public function lisaaKantaan() {
        $sql = "INSERT INTO tapahtuma(tapahtumatunnus, nimi, paikka, pvm, aika, linkki, pisteet, kuvaus) VALUES(nextval('tapahtuma_id_seq'),?,?,?,?,?,?,?) RETURNING tapahtumatunnus";
        $kysely = getTietokantayhteys()->prepare($sql);

        $ok = $kysely->execute(array($this->getNimi(), $this->getPaikka(), $this->getPvm(), $this->getAika(), $this->getLinkki(), $this->getPisteet(), $this->getKuvaus()));
        if ($ok) {
            //Haetaan RETURNING-määreen palauttama id.
            //HUOM! Tämä toimii ainoastaan PostgreSQL-kannalla!
            $this->id = $kysely->fetchColumn();
        }
        return $this->id;
    }
    
        public function poistaTapahtuma($id) {
        $param = array();
        $id = (int) $id;
        $param[] = $id;
        $sql = "DELETE FROM tapahtuma WHERE tapahtumatunnus = ?";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute($param);
    }
    
    public function paivitaKantaan() {
        $sql = "UPDATE tapahtuma SET nimi = ?, paikka = ?, pvm = ?, aika = ?, linkki = ?, pisteet = ?, kuvaus = ? WHERE tapahtumatunnus = ? RETURNING tapahtumatunnus";
        $kysely = getTietokantayhteys()->prepare($sql);

        $ok = $kysely->execute(array($this->getNimi(), $this->getPaikka(), $this->getPvm(), $this->getAika(), $this->getLinkki(), $this->getPisteet(), $this->getKuvaus(), $this->getId()));
        if ($ok) {
            //Haetaan RETURNING-määreen palauttama id.
            //HUOM! Tämä toimii ainoastaan PostgreSQL-kannalla!
            $this->id = $kysely->fetchColumn();
        }
        return $ok;
    }

    
    public function getVirheet(){
        return $this->virheet;
    }
}
