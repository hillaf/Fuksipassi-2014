<?php

require_once 'libs/common.php';
require_once 'libs/models/fuksi.php';
require_once 'libs/tietokantayhteys.php';

$id = (int) $_POST['id'];
$muokattavaFuksiLista = fuksi::etsiFuksi($id);
$muokattavaFuksi = $muokattavaFuksiLista[0];

onkoKirjautunut('fuksinmuokkausform', array(
    'muokattavafuksi' => $muokattavaFuksi
));