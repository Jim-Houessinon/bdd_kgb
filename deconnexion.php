<?php

session_start();
$_SESSION = array();
session_destroy();
echo "Vous etes deconnect√©";
header("Location: index.php");

?>
