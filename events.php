<?php
require 'libs/common.php';
require 'libs/models/event.php';
require 'libs/tietokantayhteys.php';

$tapahtumat = event::etsiKaikkiTapahtumat();

onkoKirjautunut('events', array('events' => $tapahtumat));