<?php

require 'libs/common.php';

if (isset($_SESSION['tutor'])) {
    $tapahtumaid = $_POST['tapahtumaid'];
    $paivitettavaOsallistuminen = osallistuminen::etsiOsallistuminen($_POST['fuksiid'], $tapahtumaid);
    $paivitettavaOsallistuminen->poistaOsallistuminen();

    header("Location: tapahtuma.php?id=" . $tapahtumaid);
    $_SESSION['ilmoitus'] = "Osallistuminen poistettu onnistuneesti.";
} else {
    onkoKirjautunut('index', array(
        'virheet' => "Hups! Tapahtui virhe!"
    ));
}