<?php

require 'libs/common.php';

$poistettavatapahtuma = event::etsiTapahtuma($_POST['id']);
event::poistaTapahtuma($poistettavatapahtuma->getId());

//poistettu onnistuneesti, lähetetään käyttäjä eteenpäin
header('Location: events.php');
//Asetetaan istuntoon ilmoitus siitä, että tapahtuma on poistettu.
$_SESSION['ilmoitus'] = "Tapahtuma poistettu onnistuneesti.";



