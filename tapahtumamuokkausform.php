<?php

require_once 'libs/common.php';

if (isset($_SESSION['tutor'])) {
    $muokattavatapahtuma = event::etsiTapahtuma($_POST['id']);

    onkoKirjautunut('tapahtumamuokkausform', array(
        'muokattavatapahtuma' => $muokattavatapahtuma
    ));
} else {
    onkoKirjautunut('index', array(
        'virheet' => "Hups! Tapahtui virhe!"
    ));
}
