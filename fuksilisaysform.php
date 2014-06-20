<?php

require_once 'libs/common.php';

if (isset($_SESSION['tutor'])){
    onkoKirjautunut('fuksilisaysform');
} else {
    onkoKirjautunut('index', array(
        'virhe' => "Vain tutoreilla on oikeus tarkastella muiden fuksien tietoja."
    ));
}
