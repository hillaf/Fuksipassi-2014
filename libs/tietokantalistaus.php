<?php

require 'tietokantayhteys.php';
$kysely = getTietokantayhteys()->prepare("SELECT nimi from tutor");
$kysely->execute();


$rivit = $kysely->fetchAll(PDO::FETCH_OBJ);
echo $rivit[0]->nimi;
echo $rivit[1]->nimi;
echo $rivit[2]->nimi;


echo '          < ----- Tietokantayhteys toimii! ConnectionTest ei. Debugaan huomenna! githubista löytyy sql-kansio, josta näkee mitä kaikkea kannasta löytyy tällä hetkellä';


