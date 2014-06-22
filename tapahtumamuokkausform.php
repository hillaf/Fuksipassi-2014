<?php

require_once 'libs/common.php';

$muokattavatapahtuma = event::etsiTapahtuma($_POST['id']);

onkoKirjautunut('tapahtumamuokkausform', array(
    'muokattavatapahtuma' => $muokattavatapahtuma
));
