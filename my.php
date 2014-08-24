<?php

require_once 'libs/common.php';

if (isset($_SESSION['fuksi'])) {
    $hlo = fuksi::etsiFuksi($_SESSION['fuksi']);
    $tapahtumaIDLista = fuksi::etsiFuksinTapahtumat($_SESSION['fuksi']);
    $tapahtumaLista = array();

    // etsitään tapahtumat joihin fuksi on osallistunut

    foreach ($tapahtumaIDLista as $tapahtumaID) {
        $tapahtumaLista[] = event::etsiTapahtuma($tapahtumaID);
    }
 

    $fuksinMerkinnat = osallistuminen::etsiFuksinMerkinnat($_SESSION['fuksi']);
    $fuksinTapahtumaOsallistumiset = osallistuminen::etsiFuksinOsallistututTapahtumatOsallistumisina($_SESSION['fuksi']);
    
    
    foreach ($fuksinTapahtumaOsallistumiset as $o){
        $tutorinNimi = tutor::etsiTutor($o->getTutoriid())->getNimi();
        $o->setTutoriid($tutorinNimi);
    }

    foreach ($fuksinMerkinnat as $merkinta) {
        $tutor = tutor::etsiTutor($merkinta->getTutoriid());
        $merkinta->setTutoriid($tutor->getNimi());
    }

    onkoKirjautunut('my', array(
        'kayttajanimi' => $_SESSION['kirjautunut'],
        'hlotiedot' => $hlo,
        'pisteet' => $hlo->getTapahtumaPisteet(),
        'osallistututTapahtumat' => $tapahtumaLista,
        'fuksinMerkinnat' => $fuksinMerkinnat,
        'fuksinTapahtumaOsallistumiset' => $fuksinTapahtumaOsallistumiset,
    ));
} else {
    $hlo = tutor::etsiTutor($_SESSION['tutor']);

    onkoKirjautunut('my', array(
        'kayttajanimi' => $_SESSION['kirjautunut'],
        'hlotiedot' => $hlo
    ));
}

