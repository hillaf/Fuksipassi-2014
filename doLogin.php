<?php
  
  if (empty($_POST["username"]) || empty($_POST["password"])) {
     /* Käytetään omassa kirjastotiedostossa määriteltyä näkymännäyttöfunktioita */
    naytaNakyma("login");
  }

  $kayttaja = $_POST["username"];
  $salasana = $_POST["password"];
  
  /* Tarkistetaan onko parametrina saatu oikeat tunnukset */
  if ("joo" == $kayttaja && "juu" == $salasana) {
    /* Jos tunnus on oikea, ohjataan käyttäjä sopivalla HTTP-otsakkeella kissalistaan. */
    header('Location: my.php');
  } else {
    /* Väärän tunnuksen syöttänyt saa eteensä kirjautumislomakkeen. */
    naytaNakyma("login");
  }