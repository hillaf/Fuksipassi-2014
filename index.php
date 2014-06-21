<?php

require_once 'libs/common.php';
require_once 'libs/tietokantayhteys.php';
require_once 'libs/models/osallistuminen.php';
require_once 'libs/models/event.php';

$tapahtumaIDLista = osallistuminen::etsiVahvistamattomiaOsallistumisiaSisaltavatTapahtumat();
$tapahtumat = array();

foreach ($tapahtumaIDLista as $id) {
    $tapahtuma = event::etsiTapahtuma($id);
    $tapahtumat[] = $tapahtuma[0];
}

onkoKirjautunut('index', array(
    'vahvistamattomatTapahtumat' => $tapahtumat
));
