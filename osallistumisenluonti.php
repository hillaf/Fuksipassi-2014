<?php

require_once 'libs/common.php';

$osallistuminen = new osallistuminen($_POST['fuksi'], $_POST['pisteet']);
$osallistuminen->setTutoriid($_SESSION['tutor']);
$osallistuminen->setKuvaus($_POST['kuvaus']);


if ($osallistuminen->onkoKelvollinen()) {
    $osallistuminen->lisaaMerkintaKantaan();

    //Asetetaan istuntoon ilmoitus siitä, että tapahtuma on päivitetty.
    $_SESSION['ilmoitus'] = "Merkintä lisätty onnistuneesti.";

    header('Location: fuksi.php?id=' . $_POST['fuksi']);
} else {

    unset($_SESSION['ilmoitus']);
    $virheet = $osallistuminen->getVirheet();
    $fuksi = fuksi::etsiFuksi($_POST['fuksi']);

    onkoKirjautunut('osallistumisenluontiform', array(
        'virheet' => $virheet,
        'fuksi' => $fuksi,
        'pisteet' => $_POST['pisteet'],
        'kuvaus' => $_POST['kuvaus']
    ));
}