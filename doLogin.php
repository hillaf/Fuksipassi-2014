<?php

require_once 'libs/common.php';

$virheet = array();

if (empty($_POST["username"]) || empty($_POST["password"])) {


    $virheet[] = "Kirjautuminen epäonnistui! Et antanut tunnusta ja/tai salasanaa.";
    /* Käytetään omassa kirjastotiedostossa määriteltyä näkymännäyttöfunktioita */
    naytaNakyma('login', array('virheet' => $virheet));
}

$kayttaja = $_POST["username"];
$salasana = $_POST["password"];

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

    header('Location: index.php');
} else {
    
    $virheet[] = "Kirjautuminen epäonnistui! Antamasi tunnus tai salasana on väärä.";
    /* Väärän tunnuksen syöttänyt saa eteensä kirjautumislomakkeen. */
    naytaNakyma("login", array(
        /* Välitetään näkymälle tieto siitä, kuka yritti kirjautumista */
        'kayttaja' => $kayttaja,
        'virheet' => $virheet
    ));
}