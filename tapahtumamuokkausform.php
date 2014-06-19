<?php

require_once 'libs/common.php';
require_once 'libs/models/event.php';
require_once 'libs/models/tutor.php';
require_once 'libs/tietokantayhteys.php';

$id = (int) $_POST['id'];
$muokattavaTapahtumaLista = event::etsiTapahtuma($id);
$muokattavatapahtuma = $muokattavaTapahtumaLista[0];

if (!tutor::onkoTutor($_SESSION['kirjautuneenID'])) {
    onkoKirjautunut('tapahtumamuokkausform', array(
        'muokattavatapahtuma' => $muokattavatapahtuma
    ));
} else {
    $virheet = array();
    $virheet[] = "Sinulla ei ole oikeuksia tapahtumien muokkaamiseen.";
    onkoKirjautunut('tapahtuma', array(
        'naytettavatapahtuma' => $muokattavatapahtuma,
        'virheet' => $virheet
    ));
}