<?php

require 'libs/common.php';
require 'libs/models/event.php';
require 'libs/tietokantayhteys.php';
require_once 'libs/models/tutor.php';

$poistettavanId = $_POST['id'];
$poistettavatapahtuma = event::etsiTapahtuma($poistettavanId);

if (!tutor::onkoTutor($_SESSION['kirjautuneenID'])) {

    event::poistaTapahtuma($poistettavanId);

//poistettu onnistuneesti, lähetetään käyttäjä eteenpäin
    header('Location: events.php');
//Asetetaan istuntoon ilmoitus siitä, että fuksi on poistettu.
    $_SESSION['ilmoitus'] = "Tapahtuma poistettu onnistuneesti.";
} else {
    $virheet = array();
    $_GET['id'] = $poistettavanId;
    $virheet[] = "Sinulla ei ole oikeuksia tapahtumien poistamiseen.";
    onkoKirjautunut('tapahtuma', array(
        'virheet' => $virheet
    ));
}



