<?php
session_start();

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



