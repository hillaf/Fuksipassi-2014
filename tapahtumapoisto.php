<?php

require 'libs/common.php';
require 'libs/models/event.php';
require 'libs/tietokantayhteys.php';

$poistettavatapahtuma = event::etsiTapahtuma($_POST['id']);
event::poistaTapahtuma($_POST['id']);


//poistettu onnistuneesti, lähetetään käyttäjä eteenpäin
header('Location: events.php');
//Asetetaan istuntoon ilmoitus siitä, että fuksi on poistettu.
$_SESSION['ilmoitus'] = "Tapahtuma poistettu onnistuneesti.";


