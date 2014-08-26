<?php

require_once 'libs/common.php';

if (isset($_SESSION['tutor'])) {
    onkoKirjautunut('tapahtumalisaysform');
} else {
    onkoKirjautunut('index', array(
        'virheet' => "Hups! Tapahtui virhe!"
    ));
}