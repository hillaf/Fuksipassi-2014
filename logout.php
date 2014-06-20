<?php
require_once 'libs/common.php';
unset($_SESSION["kirjautunut"]);
unset($_SESSION['tutor']);
unset($_SESSION['kirjautuneenID']);
header('Location: login.php');
