<?php
  require 'libs/tietokantayhteys.php';
  $kysely = getTietokantayhteys()->prepare("SELECT 1");
  $kysely->execute();
  
  echo $kysely->fetchColumn();