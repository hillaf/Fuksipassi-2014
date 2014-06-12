<?php

require_once 'libs/common.php';
require_once 'libs/models/fuksi.php';
require_once 'libs/tietokantayhteys.php';

$id = (int) $_GET['id'];
$naytettavaFuksiLista = fuksi::etsiFuksi($id);
$naytettavaFuksi = $naytettavaFuksiLista[0];

onkoKirjautunut('fuksi', array(
    'naytettavaFuksi' => $naytettavaFuksi
));