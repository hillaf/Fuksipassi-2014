<?php

require 'libs/common.php';

$tapahtumaid = $_POST['tapahtumaid'];
$paivitettavaOsallistuminen = osallistuminen::etsiOsallistuminen($_POST['fuksiid'], $tapahtumaid);
$paivitettavaOsallistuminen->poistaOsallistuminen();

header("Location: tapahtuma.php?id=".$tapahtumaid);
$_SESSION['ilmoitus'] = "Osallistuminen poistettu onnistuneesti.";