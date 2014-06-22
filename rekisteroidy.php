<?php

require_once 'libs/common.php';

$uusifuksi = new fuksi($_POST['nimi'], $_POST['ircnick'], $_POST['email']);
$uusiuser = new user($_POST['kayttajatunnus'], $_POST['salasana'], $_POST['salasana2']);

if ($uusifuksi->onkoKelvollinen() && $uusiuser->onkoKelvollinen()) {
    $id = $uusifuksi->lisaaKantaan();
    $uusiuser->lisaaKantaan($id);

    header('Location: index.php');

    $_SESSION['ilmoitus'] = "Rekisteröityminen onnistui.";
} else {

    unset($_SESSION['ilmoitus']);
    $virheet = $uusifuksi->getVirheet();
    $uservirheet = $uusiuser->getVirheet();

    naytaNakyma("rekisteroitymisform", array(
        'virheet' => $virheet,
        'uservirheet' => $uservirheet,
        'uusiuserNimi' => $uusifuksi->getNimi(),
        'uusiuserIrc' => $uusifuksi->getIrc(),
        'uusiuserEmail' => $uusifuksi->getEmail(),
        'uusiuserKayttaja' => $uusiuser->getTunnus()
    ));
}
