<?php

require_once 'libs/common.php';

if (isset($_SESSION['tutor'])) {
    $tapahtumaIDLista = osallistuminen::etsiVahvistamattomiaOsallistumisiaSisaltavatTapahtumat();
    $tapahtumat = array();

    foreach ($tapahtumaIDLista as $id) {
        $tapahtumat[] = event::etsiTapahtuma($id);
    }

    onkoKirjautunut('index', array(
        'vahvistamattomatTapahtumat' => $tapahtumat
    ));
} else {
    onkoKirjautunut('index', array());
}