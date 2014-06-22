<?php
require_once 'libs/common.php';

$tapahtumat = event::etsiKaikkiTapahtumat();

onkoKirjautunut('events', array('events' => $tapahtumat));