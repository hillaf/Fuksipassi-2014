<?php
class fuksi {
  
  private $id;
  private $nimi;
  private $irc;
  private $email;

  public function __construct($id, $nimi, $irc, $email) {
    $this->id = $id;
    $this->nimi = $nimi;
    $this->irc = $irc;
    $this->email = $email;
  }

  public function getId(){
      return $this->id;
  }
  
  public function getNimi(){
      return $this->nimi;
  }
  
  public function getIrc(){
      return $this->irc;
  }
  
  public function getEmail(){
      return $this->email;
  }
  
  public function setId($id){
      $this->id = $id;
  }
  
  public function setNimi($nimi){
      $this->nimi = $nimi;
  }
  
  public function setIrc($irc){
      $this->irc = $irc;
  }
  
  public function setEmail($email){
      $this->email = $email;
  }
  
}