<?php

require 'libs/common.php';

$otunnus = $_POST['id'];
osallistuminen::poistaOsallistuminenTunnuksella($otunnus);

header("Location: fuksi.php?id=" . $_POST['fuksi']);
$_SESSION['ilmoitus'] = "Merkintä poistettu onnistuneesti.";



