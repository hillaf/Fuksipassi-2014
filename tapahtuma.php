<?php

require_once 'libs/common.php';
require_once 'libs/models/event.php';
require_once 'libs/tietokantayhteys.php';

$id = (int) $_GET['id'];


$naytettavaTapahtumaLista = event::etsiTapahtuma($id);
$naytettavatapahtuma = $naytettavaTapahtumaLista[0];

onkoKirjautunut('tapahtuma', array(
    'naytettavatapahtuma' => $naytettavatapahtuma
));
