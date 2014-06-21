<?php

require_once 'libs/common.php';
require_once 'libs/models/fuksi.php';
require_once 'libs/tietokantayhteys.php';

$id = (int) $_GET['id'];

$naytettavaFuksi = fuksi::etsiFuksi($id);

onkoKirjautunut('fuksi', array(
    'naytettavaFuksi' => $naytettavaFuksi
));