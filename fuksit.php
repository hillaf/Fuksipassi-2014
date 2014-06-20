<?php

require 'libs/common.php';
require 'libs/models/fuksi.php';
require 'libs/tietokantayhteys.php';

$fuksit = fuksi::etsiKaikkiFuksit();

if (isset($_SESSION['tutor'])){
    onkoKirjautunut('fuksit', array('fuksit' => $fuksit));
} else {
   
    onkoKirjautunut('index', array(
        'virhe' => "Vain tutoreilla on oikeus tarkastella muiden fuksien tietoja."
    ));
}

