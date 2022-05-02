<?php

/**
 * Connexion utilisateur
 */

/**
 * 1. Récupération des données du formulaire et nettoyage
 * 2. Vérifier si l'email existe en BDD
 * 		2.1. Si oui, on vérifie le mot de passe
 * 		2.2. Sinon, on affiche une erreur
 * 
 * 3. Si le pass est correct, on ouvre un session
 * 4. Redirige l'utilisateur connecté
 */

/**
 * Ouverture des session
 * A placer au plus haut possible, avant tout code PHP si possible
 */
session_start();

// Si l'utilisateur est connecté, on le redirige vers la page d'accueil
if (isset($_SESSION['user'])) {
	header('Location: index.php');
}

require_once 'connexion.php';
require_once 'vendor/autoload.php';

$error = null;

if (!empty($_POST)) {
	// 1. Récupération des données du formulaire et nettoyage
	$email = htmlspecialchars(strip_tags($_POST['email']));
	$password = htmlspecialchars(strip_tags($_POST['password']));

	// 2. Vérifier si l'email existe en BDD
	$query = $db->prepare('SELECT * FROM users WHERE email = :email');
	$query->bindValue(':email', $email);
	$query->execute();

	// Récupère la première information trouvée
	$user = $query->fetch();
	// dump($user);

	// Si l'utilisateur existe...
	if ($user) {
		// 2.1. Si oui, on vérifie le mot de passe
		if (password_verify($password, $user['password'])) {
			// Enregistre des données dans une session
			$_SESSION['user'] = [
				'id' => $user['id'],
				'firstname' => $user['firstname'],
				'lastname' => $user['lastname'],
				'email' => $user['email'],
				'role' => $user['role']
			];

			// Redirection vers l'accueil
			header('Location: index.php');
		}
		else {
			$error = 'Email et/ou mot de passe invalide';
		}
	}
	else {
		$error = 'Email et/ou mot de passe invalide';
	}
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Philosophy. - Connexion</title>

		<!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

		<!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

		<!-- Placer sa feuille de style CSS en dernière position -->
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<!-- Inclusion du header de la page -->
        <?php require_once 'layouts/header.php'; ?>

		<main class="pt-5">
			<div class="container">
                <form method="post" class="w-50 mx-auto pb-5">
                    <h1>Se connecter</h1>

					<!-- Message d'erreur -->
					<?php if($error !== null): ?>
						<div class="alert alert-danger">
							<?php echo $error; ?>
						</div>
					<?php endif; ?>

                    <div class="mb-3 mt-4">
                        <label for="email" class="form-label">Adresse email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button class="btn btn-primary">Se connecter</button>
                </form>
			</div>
		</main>

		<!-- Inclusion du footer de la page -->
        <?php require_once 'layouts/footer.php'; ?>
	</body>
</html>
