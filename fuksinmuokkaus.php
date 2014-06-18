<?php

require 'libs/common.php';
require 'libs/models/fuksi.php';
require 'libs/tietokantayhteys.php';


$fuksi = new fuksi($_POST['nimi'], $_POST['ircnick'], $_POST['email']);

if ($fuksi->onkoKelvollinen()) {
    $fuksi->paivitaKantaan();

    //Asetetaan istuntoon ilmoitus siitä, että fuksi on päivitetty.
    $_SESSION['ilmoitus'] = "Fuksin tiedot päivitetty onnistuneesti.";
    
    onkoKirjautunut('fuksi', array('naytettavaFuksi'=>$fuksi));
} else {
    
    unset($_SESSION['ilmoitus']);
    $virheet = $fuksi->getVirheet();
 
    onkoKirjautunut('fuksinmuokkausform', array(
        'virheet'=>$virheet, 
        'muokattavafuksi'=>$fuksi));
}