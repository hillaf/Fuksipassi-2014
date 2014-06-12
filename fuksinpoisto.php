<?php

require 'libs/common.php';
require 'libs/models/fuksi.php';
require 'libs/tietokantayhteys.php';

$poistettavafuksi = fuksi::etsiFuksi($_POST['id']);
fuksi::poistaFuksi($_POST['id']);


//poistettu onnistuneesti, lähetetään käyttäjä eteenpäin
header('Location: fuksit.php');
//Asetetaan istuntoon ilmoitus siitä, että fuksi on poistettu.
$_SESSION['ilmoitus'] = "Fuksi poistettu onnistuneesti.";


