<?php

require_once 'libs/common.php';

$id = (int) $_GET['id'];

$naytettavaFuksi = fuksi::etsiFuksi($id);
$osallistututTapahtumaIDt = osallistuminen::etsiFuksinOsallistututTapahtumat($id);
$osallistututTapahtumat = array();

foreach ($osallistututTapahtumaIDt as $tapahtumaID) {
    $tapahtumapaskile = event::etsiTapahtuma($tapahtumaID);
    $osallistututTapahtumat[] = $tapahtumapaskile[0];
}


onkoKirjautunut('fuksi', array(
    'naytettavaFuksi' => $naytettavaFuksi,
    'osallistututTapahtumat' => $osallistututTapahtumat
));