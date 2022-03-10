<?php

session_start();
$_SESSION = array();
session_destroy();
echo "Vous etes deconnecté";
header("Location: index.php");

?>
