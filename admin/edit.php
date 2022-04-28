<?php

require_once '../connexion.php';
require_once '../vendor/autoload.php';

/**
 * Sélection de toutes les catégories en BDD
 */
$query = $db->query('SELECT * FROM categories ORDER BY name');
$categories = $query->fetchAll();

/**
 * Déclaration de variables à NULL
 * Elles serviront à remplir le formulaire des données soumises
 * par l'utilisateur
 */
$title = null;
$content = null;
$category = null;
$error = null;

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Philosophy. - Administration (Edition d'un article)</title>

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

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
                <form method="post" enctype="multipart/form-data" class="w-50 mx-auto">
                    
                    <!-- Affichage d'une erreur formulaire si nécessaire -->
                    <?php if($error !== null): ?>
                        <div class="alert alert-danger">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>    
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Titre</label>
                        <input type="text" value="<?php echo $title; ?>" class="form-control" id="title" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Contenu</label>
                        <textarea class="form-control" id="content" name="content" rows="10"><?php echo $content; ?></textarea>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="mb-3">
                                <label for="category" class="form-label">Catégorie</label>
                                <select class="form-select" id="category" name="category">
                                    <option>Choisir une catégorie</option>

                                    <!-- Liste des catégories -->
                                    <?php foreach($categories as $categorie): ?>
                                        <option value="<?php echo $categorie['id']; ?>" <?php echo ($category !== null && $category == $categorie['id']) ? 'selected': null; ?>>
                                            <?php echo $categorie['name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="cover" class="form-label">Image de couverture</label>
                                <input class="form-control" type="file" id="cover" name="cover">
                                <div id="coverHelpBlock" class="form-text">
                                    L'image ne doit pas dépasser les 1Mo.
                                </div>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <img src="../images/upload/01.jpg" alt="Mon image" class="img-fluid rounded">
                        </div>
                    </div>
                    <button class="btn btn-primary">Enregistrer les modifications</button>
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