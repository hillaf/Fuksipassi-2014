<?php

require 'libs/common.php';

if (isset($_SESSION['tutor'])) {

    $tapahtumaid = $_POST['tapahtumaid'];
    $paivitettavaOsallistuminen = osallistuminen::etsiOsallistuminen($_POST['fuksiid'], $tapahtumaid);
    $paivitettavaOsallistuminen->vahvistaOsallistuminen($_SESSION['tutor']);


    header("Location: tapahtuma.php?id=" . $tapahtumaid);
    $_SESSION['ilmoitus'] = "Osallistuminen vahvistettu onnistuneesti.";
} else {
    onkoKirjautunut('index', array(
        'virheet' => "Hups! Tapahtui virhe!"
    ));
}