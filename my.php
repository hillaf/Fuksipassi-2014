<?php

require_once 'libs/common.php';
require_once 'libs/models/fuksi.php';
require_once 'libs/models/user.php';
require_once 'libs/models/tutor.php';
require_once 'libs/tietokantayhteys.php';




// yäähhh! korjaan joskus


if (isset($_SESSION['fuksi'])) {
    $fuksilista = fuksi::etsiFuksi($_SESSION['fuksi']);
    $hlo = $fuksilista[0];

    onkoKirjautunut('my', array(
        'kayttajanimi' => $_SESSION['kirjautunut'],
        'hlotiedot' => $hlo,
        'pisteet' => $hlo->getPisteet()
    ));
    
} else {
    $tutorlista = tutor::etsiTutor($_SESSION['tutor']);
    $hlo = $tutorlista[0];

    onkoKirjautunut('my', array(
        'kayttajanimi' => $_SESSION['kirjautunut'],
        'hlotiedot' => $hlo
    ));
}

