<?php

require_once 'libs/common.php';
require_once 'libs/models/fuksi.php';
require_once 'libs/tietokantayhteys.php';

if (isset($_SESSION['tutor'])) {

    $fuksi = fuksi::etsiFuksi($_POST['fuksi']);
    onkoKirjautunut('osallistumisenluontiform', array(
        'fuksi' => $fuksi
    ));
} else {
    $virheet = array();
    $virheet[] = "Vain tutoreilla on oikeus tarkastella muiden fuksien tietoja.";
    onkoKirjautunut('index', array(
        'virheet' => $virheet
    ));
}
