<?php

require 'Kayttaja.php';
require 'tietokantayhteys.php';



$sql = "SELECT id,tunnus, password FROM users";
$kysely = getTietokantayhteys()->prepare($sql);
$kysely->execute();

echo "TUNNUKSET";
echo "<br>";

$tulokset = array();

foreach ($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
    $kayttaja = new Kayttaja();
    $kayttaja->setId($tulos->id);
    $kayttaja->setTunnus($tulos->tunnus);
    $kayttaja->setSalasana($tulos->salasana);

    //$array[] = $muuttuja; lisää muuttujan arrayn perään. 
    //Se vastaa melko suoraan ArrayList:in add-metodia.
    $tulokset[] = $kayttaja;
}

foreach ($tulokset as $value) {
    echo "<br>";
    echo $value->getTunnus();
}


