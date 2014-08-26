<?php

require_once 'libs/common.php';

if (isset($_SESSION['fuksi'])) {
    $tapahtumaID = $_POST['id'];
    $fuksiID = $_SESSION['fuksi'];
    $tapahtuma = event::etsiTapahtuma($tapahtumaID);
    $pisteet = $tapahtuma->getPisteet();

    $uusiOsallistuminen = new osallistuminen($fuksiID, $pisteet);
    $uusiOsallistuminen->setTapahtumaid($tapahtumaID);
    $uusiOsallistuminen->lisaaAlustavaOsallistuminenKantaan();

    header("Location: tapahtuma.php?id=" . $tapahtumaID);
    $_SESSION['ilmoitus'] = "Sinut on merkitty osallistuneeksi tapahtumaan.";
} else {
    onkoKirjautunut('index', array(
        'virheet' => "Hups! Tapahtui virhe!"
    ));
}