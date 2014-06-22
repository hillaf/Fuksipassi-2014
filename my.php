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

    onkoKirjautunut('my', array(
        'kayttajanimi' => $_SESSION['kirjautunut'],
        'hlotiedot' => $hlo,
        'pisteet' => $hlo->getPisteet(),
        'osallistututTapahtumat' => $tapahtumaLista
    ));
    
} else {
    $hlo = tutor::etsiTutor($_SESSION['tutor']);

    onkoKirjautunut('my', array(
        'kayttajanimi' => $_SESSION['kirjautunut'],
        'hlotiedot' => $hlo
    ));
}

