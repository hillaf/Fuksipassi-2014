<?php
class user {
  
  private $id;
  private $tunnus;
  private $salasana;

  public function __construct($id, $tunnus, $salasana) {
    $this->id = $id;
    $this->tunnus = $tunnus;
    $this->salasana = $salasana;
  }

  public function getId(){
      return $this->id;
  }
  
  public function getTunnus(){
      return $this->tunnus;
  }
  
  public function getSalasana(){
      return $this->salasana;
  }
  
  public function setId($id){
      $this->id = $id;
  }
  
  public function setTunnus($tunnus){
      $this->tunnus = $tunnus;
  }
  
  public function setSalasana($salasana){
      $this->salasana = $salasana;
  }
  
}