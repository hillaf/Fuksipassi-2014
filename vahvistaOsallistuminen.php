<?php

require 'libs/common.php';
require 'libs/models/osallistuminen.php';
require 'libs/tietokantayhteys.php';

$tapahtumaid = $_POST['tapahtumaid'];
$paivitettavaOsallistuminen = osallistuminen::etsiOsallistuminen($_POST['fuksiid'], $tapahtumaid);
$paivitettavaOsallistuminen->vahvistaOsallistuminen($_SESSION['tutor']);


header("Location: tapahtuma.php?id=".$tapahtumaid);
$_SESSION['ilmoitus'] = "Osallistuminen vahvistettu onnistuneesti.";