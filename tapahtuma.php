<?php

require_once 'libs/common.php';
require_once 'libs/models/event.php';
require_once 'libs/tietokantayhteys.php';
require_once 'libs/models/osallistuminen.php';

$id = (int) $_GET['id'];


$naytettavaTapahtumaLista = event::etsiTapahtuma($id);
$naytettavatapahtuma = $naytettavaTapahtumaLista[0];

$onkoOsallistunut = osallistuminen::onkoOsallistunut($_SESSION['fuksi'], $id);

onkoKirjautunut('tapahtuma', array(
    'naytettavatapahtuma' => $naytettavatapahtuma,
    'onkoOsallistunut' => $onkoOsallistunut
));
