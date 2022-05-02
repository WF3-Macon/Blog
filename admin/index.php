<?php

// Vérifier si l'accès est autorisé
require_once 'checkAdmin.php';

// Connexion à la BDD
require_once '../connexion.php';

// Chargement des dépendances Composer
require_once '../vendor/autoload.php';

// Passe la requête SQL
$query = $db->query('SELECT id, title, created_at FROM posts ORDER BY posts.created_at DESC');

// Recupère tous les résultats et je les stocke dans la variable "$articles"
$articles = $query->fetchAll();

// dump($articles);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Philosophy. - Administration</title>

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="js/delete.js" defer></script>

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- Placer sa feuille de style CSS en dernière position -->
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <header class="bg-dark py-4">
            <div class="container">

                <!-- Ligne -->
                <div class="row">
                    <!-- Titre du site -->
                    <div class="col-6 col-lg-12 text-start text-lg-center">
                        <a href="index.php" title="Philo..." class="text-white text-decoration-none h1 logo">
                            Philosophy. <span class="text-danger fs-4">Administration</span>
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
                                <li><a href="../index.php" title="Go blog" class="text-secondary text-decoration-none">Aller sur le blog</a></li>
                                <li><a href="index.php" title="Home" class="text-secondary text-decoration-none">Articles</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <div class="gradient"></div>

        <main class="py-5">
            <div class="container">

                <div class="d-flex align-items-center justify-content-between pb-4">
                    <h3 class="pb-3">Gestion des articles</h3>
                    <a href="add.php" title="Ajouter un article" class="btn btn-success">
                        Nouvel article
                    </a>
                </div>

                <?php if(isset($_GET['successAdd'])): ?>
                    <div class="alert alert-success mb-4">
                        L'article à bien été ajouté !
                    </div>
                <?php endif; ?>

                <?php if(isset($_GET['successDelete'])): ?>
                    <div class="alert alert-success mb-4">
                        L'article à bien été supprimé !
                    </div>
				<?php endif; ?>

                <table class="table table-striped table-hover">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">#</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Créer le</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($articles as $article): ?>
                            <tr>
                                <th class="py-4" scope="row"><?php echo $article['id']; ?></th>
                                <td class="py-4"><?php echo $article['title']; ?></td>
                                <td class="py-4"><?php echo date('d.m.Y', strtotime($article['created_at'])); ?></td>
                                <td class="py-3">
                                    <a href="edit.php?id=<?php echo $article['id']; ?>" title="Editer" class="btn btn-secondary">
                                        Editer
                                    </a>
                                    <a href="delete.php?id=<?php echo $article['id']; ?>" title="Delete" class="ps-2 btn btn-outline-danger btnDelete">
                                        Supprimer cet article
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- Confirmation de suppression -->
                <div class="modal fade" id="confirmDelete" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Confirmation de suppression</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Êtes-vous sûr de vouloir supprimer cet article ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                                <a href="#" class="btn btn-danger btnDeleteModal">Oui, je supprime !</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>

        <footer class="bg-dark py-4">
            <div class="container">
                <p class="m-0 text-white">&copy; Copyright Philosophy 2022</p>
            </div>
        </footer>
    </body>
</html>
