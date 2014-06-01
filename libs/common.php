<?php
session_start();

function naytaNakyma($sivu, $data = array()) {
    $data = (object) $data;
    $sivu = $sivu;
    require 'views/frame.php';
    exit();
}

function onkoKirjautunut($kohde) {
    if (isset($_SESSION['kirjautunut'])) {
        naytaNakyma($kohde);
    } else {
        naytaNakyma('login');
    }
}


