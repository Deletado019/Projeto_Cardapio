<?php

session_start();

// zerando as sessao
$_SESSION = [];

// destroe a sessao
session_destroy();

header('location: login.php');



?>