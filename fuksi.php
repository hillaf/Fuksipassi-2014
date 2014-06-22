<?php

require_once 'libs/common.php';

$id = (int) $_GET['id'];

$naytettavaFuksi = fuksi::etsiFuksi($id);
$osallistututTapahtumaIDt = osallistuminen::etsiFuksinOsallistututTapahtumat($id);
$fuksinMerkinnat = osallistuminen::etsiFuksinMerkinnat($id);
$osallistututTapahtumat = array();

foreach ($osallistututTapahtumaIDt as $tapahtumaID) {
    $osallistututTapahtumat[] = event::etsiTapahtuma($tapahtumaID);
}

foreach ($fuksinMerkinnat as $merkinta) {
    $tutor = tutor::etsiTutor($merkinta->getTutoriid());
    $merkinta->setTutoriid($tutor->getNimi());
}



onkoKirjautunut('fuksi', array(
    'naytettavaFuksi' => $naytettavaFuksi,
    'osallistututTapahtumat' => $osallistututTapahtumat,
    'fuksinMerkinnat' => $fuksinMerkinnat,
    'pisteet' => $naytettavaFuksi->getTapahtumaPisteet(),
    'pisteetYhteensa' => $naytettavaFuksi->getPisteet()
));