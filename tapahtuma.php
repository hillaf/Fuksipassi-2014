<?php

require_once 'libs/common.php';
require_once 'libs/models/event.php';
require_once 'libs/models/fuksi.php';
require_once 'libs/tietokantayhteys.php';
require_once 'libs/models/osallistuminen.php';

$id = (int) $_GET['id'];


$naytettavaTapahtumaLista = event::etsiTapahtuma($id);
$naytettavatapahtuma = $naytettavaTapahtumaLista[0];

if (isset($_SESSION['fuksi'])) {
    $onkoOsallistunut = osallistuminen::onkoOsallistunut($_SESSION['fuksi'], $id);

    onkoKirjautunut('tapahtuma', array(
        'naytettavatapahtuma' => $naytettavatapahtuma,
        'onkoOsallistunut' => $onkoOsallistunut
    ));
} else {
    
    $osallistumiset = osallistuminen::etsiOsallistumisetTapahtumasta($naytettavatapahtuma->getId());
    $vahvistetutfuksit = array();
    $vahvistamattomatfuksit = array();
    
    foreach ($osallistumiset as $osallistuminen) {
        
        if ($osallistuminen->getTutoriid() != null){
            $vahvistetutfuksit[] = fuksi::etsiFuksi($osallistuminen->getFuksiid());
        } else {
            $vahvistamattomatfuksit[] = fuksi::etsiFuksi($osallistuminen->getFuksiid());
        }
    }
    
    onkoKirjautunut('tapahtuma', array(
        'naytettavatapahtuma' => $naytettavatapahtuma,
        'vahvistetutfuksit' => $vahvistetutfuksit,
        'vahvistamattomatfuksit' => $vahvistamattomatfuksit
    ));
}

