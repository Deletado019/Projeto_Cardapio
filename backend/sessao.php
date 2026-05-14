
<?php

session_start();

if($_SESSION['logado']!='sim'){

header("location: login.php");

}
?>