<?php

/**
 * Déconnexion
 */

// Ouverture de la session
session_start();

// Détruit la variable de session "user"
unset($_SESSION['user']);

// Détruit toutes les variables de session
session_unset();

// Détruit toutes les sessions existantes
session_destroy();

// Redirection vers la page d'accueil
header('Location: index.php');
