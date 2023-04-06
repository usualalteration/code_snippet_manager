<?php
session_start();
// Elimina le variabili di sessione impostate
$_SESSION = array();
// Elimina la sessione
session_destroy();
echo "Disconnessione riuscita, arrivederci!";
?>