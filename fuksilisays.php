<?php

require 'libs/common.php';
require 'libs/models/fuksi.php';
require 'libs/tietokantayhteys.php';

$uusifuksi = new fuksi($_POST['fuksitunnus'], $_POST['nimi'], $_POST['ircnick'], $_POST['email']);

if ($uusifuksi->onkoKelvollinen()) {
    $uusifuksi->lisaaKantaan();

    //lisättiin kantaan onnistuneesti, lähetetään käyttäjä eteenpäin
    header('Location: fuksit.php');
    //Asetetaan istuntoon ilmoitus siitä, että fuksi on lisätty.
    $_SESSION['ilmoitus'] = "Uusi fuksi lisätty onnistuneesti.";
} else {
    $virheet = $uusifuksi->getVirheet();
    $fuksit = fuksi::etsiKaikkiFuksit();

    naytaNakyma("fuksit", array(
        'virhe' => "Lisäys epäonnistui. Täytithän kaikki kentät?",
        'fuksit' => $fuksit
    ));
}
