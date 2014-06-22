<?php

require 'libs/common.php';

if (isset($_SESSION['tutor'])) {
    $fuksit = fuksi::etsiKaikkiFuksit();

    onkoKirjautunut('fuksit', array(
        'fuksit' => $fuksit
    ));
} else if (isset($_SESSION['fuksi'])) {

    $virheet = array();
    $virheet[] = "Vain tutoreilla on oikeus tarkastella muiden fuksien tietoja.";
    onkoKirjautunut('index', array(
        'virheet' => $virheet
    ));
} else {
    onkoKirjautunut('index');
}

