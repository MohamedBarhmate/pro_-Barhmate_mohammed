<?php
// En supposant que les informations utilisateur sont stockées dans une session après la connexion
session_start();

//Détruire toutes les variables de session
session_destroy();

// Redirection vers la page de connexion
header("Location: login.php");
exit();
?>