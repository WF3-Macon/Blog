<?php

/**
 * Supprime un article
 */

// Vérifier si l'accès est autorisé
require_once 'checkAdmin.php';

// Connexion à la base de données
require_once '../connexion.php';

// Récupère et nettoie l'ID
$id = htmlspecialchars(strip_tags($_GET['id']));

// Supprime l'article via son ID
$query = $db->prepare('DELETE FROM posts WHERE id = :id');
$query->bindValue(':id', $id, PDO::PARAM_INT);
$query->execute();

// Si aucun ligne n'a été affectées par la suppression, on redirige vers une erreur 404
if ($query->rowCount() === 0) {
	header('Location: ../404.php');
}
else {
	// Redirection vers la page d'accueil de l'admin en cas de succès
	header('Location: index.php?successDelete=1');
}
