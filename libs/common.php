<?php

function naytaNakyma($sivu, $data = array()) {
    $data = (object) $data;
    $sivu = $sivu;
    require 'views/frame.php';
    exit();
}

function onkoKirjautunut() {
    session_start();
    if (isset($_SESSION['kirjautunut'])) {
        return true;
    } else {
        return false;
    }
}


