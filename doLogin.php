<?php
  require_once 'libs/common.php';
  require_once 'libs/models/user.php';
  
  if (empty($_POST["username"]) || empty($_POST["password"])) {
     /* Käytetään omassa kirjastotiedostossa määriteltyä näkymännäyttöfunktioita */
    naytaNakyma('login', array('virhe' => "Kirjautuminen epäonnistui! Et antanut tunnusta ja/tai salasanaa."));
  }

  $kayttaja = $_POST["username"];
  $salasana = $_POST["password"];
  
  /* Tarkistetaan onko parametrina saatu oikeat tunnukset */
  $kirjautuja = user::etsiKayttajaTunnuksilla($kayttaja, $salasana);
  
  if ($kirjautuja != null) {
    /* Jos tunnus on oikea, ohjataan käyttäjä sopivalla HTTP-otsakkeella kissalistaan. */
    
      session_start();
      $_SESSION['kirjautunut'] = $kirjautuja;
      
      header('Location: my.php');
  } else {
    /* Väärän tunnuksen syöttänyt saa eteensä kirjautumislomakkeen. */
    naytaNakyma("login", array(
    /* Välitetään näkymälle tieto siitä, kuka yritti kirjautumista */
    'kayttaja' => $kayttaja,
    'virhe' => "Kirjautuminen epäonnistui! Antamasi tunnus tai salasana on väärä."
  ));
  }