<?php

require 'libs/common.php';

$uusitapahtuma = new event($_POST['nimi'], $_POST['paikka'], $_POST['pvm'], $_POST['aika'], $_POST['linkki'], $_POST['pisteet'], $_POST['kuvaus']);


if ($uusitapahtuma->onkoKelvollinen()) {
    $uusitapahtuma->lisaaKantaan();

    //lisättiin kantaan onnistuneesti, lähetetään käyttäjä eteenpäin
    header('Location: events.php');
    //Asetetaan istuntoon ilmoitus siitä, että fuksi on lisätty.
    $_SESSION['ilmoitus'] = "Uusi tapahtuma lisätty onnistuneesti.";
} else {

    unset($_SESSION['ilmoitus']);
    $virheet = $uusitapahtuma->getVirheet();
    $tapahtumat = event::etsiKaikkiTapahtumat();

    naytaNakyma("tapahtumalisaysform", array(
        'virheet' => $virheet,
        'uusitapahtumaid' => $uusitapahtuma->getId(),
        'uusitapahtumanimi' => $uusitapahtuma->getNimi(),
        'uusitapahtumapaikka' => $uusitapahtuma->getPaikka(),
        'uusitapahtumapvm' => $uusitapahtuma->getPvm(),
        'uusitapahtumaaika' => $uusitapahtuma->getAika(),
        'uusitapahtumalinkki' => $uusitapahtuma->getLinkki(),
        'uusitapahtumapisteet' => $uusitapahtuma->getPisteet(),
        'uusitapahtumakuvaus' => $uusitapahtuma->getKuvaus()
    ));
}