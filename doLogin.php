<?php

require_once 'libs/common.php';

$virheet = array();
$kayttaja = $_POST["kayttajatunnus"];
$salasana = $_POST["salasana"];

if (empty($_POST["kayttajatunnus"]) || empty($_POST["salasana"])) {


    $virheet[] = "Kirjautuminen epäonnistui! Et antanut tunnusta ja/tai salasanaa.";
    /* Käytetään omassa kirjastotiedostossa määriteltyä näkymännäyttöfunktioita */
    naytaNakyma('login', array(
        'kayttaja' => $kayttaja,
        'salasana' => $salasana,
        'virheet' => $virheet
    ));
}



/* Tarkistetaan onko parametrina saatu oikeat tunnukset */
$kirjautuja = user::etsiKayttajaTunnuksilla($kayttaja, $salasana);

if ($kirjautuja != null) {
    /* Jos tunnus on oikea, ohjataan käyttäjä sopivalla HTTP-otsakkeella eteenpäin. */

    $_SESSION['kirjautunut'] = $kirjautuja->getTunnus();
    $_SESSION['kirjautuneenID'] = $kirjautuja->getId();


    if (tutor::onkoTutor($kirjautuja->getTutortunnus())) {
        $_SESSION['tutor'] = $kirjautuja->getTutortunnus();
    } else {
        $_SESSION['fuksi'] = $kirjautuja->getFuksitunnus();
    }

    $_SESSION['ilmoitus'] = "Kirjautuminen onnistui!";
    header('Location: index.php');
} else {

    $virheet[] = "Kirjautuminen epäonnistui! Antamasi tunnus tai salasana on väärä.";
    /* Väärän tunnuksen syöttänyt saa eteensä kirjautumislomakkeen. */
    naytaNakyma("login", array(
        /* Välitetään näkymälle tieto siitä, kuka yritti kirjautumista */
        'kayttaja' => $kayttaja,
        'salasana' => $salasana,
        'virheet' => $virheet
    ));
}