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
		<header class="bg-dark py-4">
			<div class="container">

				<!-- Ligne -->
				<div class="row">
					<!-- Titre du site -->
					<div class="col-6 col-lg-12 text-start text-lg-center">
						<a href="index.php" title="Philo..." class="text-white text-decoration-none h1 logo">
							Philosophy.
						</a>
					</div>

					<!-- Menu burger -->
					<div class="col-6 d-block d-lg-none text-end">
						<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-list text-white" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
						</svg>
					</div>

					<!-- Navigation -->
					<div class="col-12 d-none d-lg-block">
						<nav>
							<ul class="d-flex align-items-center justify-content-center gap-5 pt-3 m-0">
								<li><a href="index.php" title="Home" class="text-secondary text-decoration-none">Accueil</a></li>
								<li><a href="#" title="Categories" class="text-secondary text-decoration-none">Categories</a></li>
								<li><a href="#" title="Styles" class="text-secondary text-decoration-none">Styles</a></li>
								<li><a href="#" title="About" class="text-secondary text-decoration-none">About</a></li>
								<li><a href="#" title="Contact" class="text-secondary text-decoration-none">Contact</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</header>
		<div class="gradient"></div>

		<main class="pt-5">
			<div class="container">
                <form action="" method="post" class="w-50 mx-auto pb-5">
                    <h1>Se connecter</h1>
                    <div class="mb-3 mt-4">
                        <label for="email" class="form-label">Adresse email</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <button class="btn btn-primary">Se connecter</button>
                </form>
			</div>
		</main>

		<footer class="bg-dark py-4">
			<div class="container">
				<p class="m-0 text-white">&copy; Copyright Philosophy 2022</p>
			</div>
		</footer>
	</body>
</html>
