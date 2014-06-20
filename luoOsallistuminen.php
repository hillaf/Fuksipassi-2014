<?php

require_once 'libs/common.php';
require_once 'libs/tietokantayhteys.php';
require_once 'libs/models/fuksi.php';
require_once 'libs/models/tutor.php';
require_once 'libs/models/event.php';
require_once 'libs/models/osallistuminen.php';

$tapahtumaID = $_POST['id'];
$fuksiID = $_SESSION['fuksi'];
$tapahtumaLista = event::etsiTapahtuma($tapahtumaID);
$tapahtuma = $tapahtumaLista[0];
$pisteet = $tapahtuma->getPisteet();

$uusiOsallistuminen = new osallistuminen($tapahtumaID, $fuksiID, $pisteet);
$uusiOsallistuminen->lisaaAlustavaOsallistuminenKantaan();

header("Location: tapahtuma.php?id=".$tapahtumaID);
$_SESSION['ilmoitus'] = "Sinut on merkitty osallistuneeksi tapahtumaan.";
