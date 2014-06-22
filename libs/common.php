<?php
session_start();

require_once 'tietokantayhteys.php';
require_once 'libs/models/fuksi.php';
require_once 'libs/models/tutor.php';
require_once 'libs/models/event.php';
require_once 'libs/models/osallistuminen.php';
require_once 'libs/models/user.php';

function naytaNakyma($sivu, $data = array()) {
    $data = (object) $data;
    $sivu = $sivu;
    require 'views/frame.php';
    exit();
}

function onkoKirjautunut($kohde, $data = array()) {
    
    if (isset($_SESSION['kirjautunut'])) {
        naytaNakyma($kohde, $data);
    } else {
        naytaNakyma('login', $data);
    }
}



