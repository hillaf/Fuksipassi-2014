<?php

require_once 'libs/common.php';

$tapahtumaIDLista = osallistuminen::etsiVahvistamattomiaOsallistumisiaSisaltavatTapahtumat();
$tapahtumat = array();

foreach ($tapahtumaIDLista as $id) {
    $tapahtumat[] = event::etsiTapahtuma($id);
}

onkoKirjautunut('index', array(
    'vahvistamattomatTapahtumat' => $tapahtumat
));
