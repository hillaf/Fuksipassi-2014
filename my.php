<?php

require_once 'libs/common.php';
  if (onkoKirjautunut() == true){
      naytaNakyma('my');
  } else {
      naytaNakyma('login');
  }
