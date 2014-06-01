<?php
require_once 'libs/common.php';
unset($_SESSION["kirjautunut"]);
header('Location: login.php');
