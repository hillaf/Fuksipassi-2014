<?php

require_once 'libs/common.php';

$id = (int) $_GET['id'];

$naytettavatapahtuma = event::etsiTapahtuma($id);

if (isset($_SESSION['fuksi'])) {
    $onkoOsallistunut = osallistuminen::onkoOsallistunut($_SESSION['fuksi'], $id);

    onkoKirjautunut('tapahtuma', array(
        'naytettavatapahtuma' => $naytettavatapahtuma,
        'onkoOsallistunut' => $onkoOsallistunut
    ));
} else {
    
    // näytetään tutorille kaikki osallistuneet fuksit
    
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

