<?php

require 'libs/common.php';

if (isset($_SESSION['tutor'])) {
    $otunnus = $_POST['id'];
    osallistuminen::poistaOsallistuminenTunnuksella($otunnus);

    header("Location: fuksi.php?id=" . $_POST['fuksi']);
    $_SESSION['ilmoitus'] = "Merkintä poistettu onnistuneesti.";
} else {
    onkoKirjautunut('index', array(
        'virheet' => "Hups! Tapahtui virhe!"
    ));
}

