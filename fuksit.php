<?php

require 'libs/common.php';
require 'libs/models/fuksi.php';
require 'libs/tietokantayhteys.php';

$fuksit = fuksi::etsiKaikkiFuksit();


onkoKirjautunut('fuksit', array('fuksit' => $fuksit));
