<?php

// Ouverture de la session
session_start();

// Connexion à la BDD
require_once 'connexion.php';

// Chargement des dépendances Composer
require_once 'vendor/autoload.php';

// Passe la requête SQL
$query = $db->query('SELECT posts.id, posts.title, posts.content, posts.cover, posts.created_at, posts.category_id, categories.name AS category FROM posts INNER JOIN categories ON categories.id = posts.category_id ORDER BY posts.created_at DESC');

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
        <title>Philosophy.</title>

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
                            <ul class="d-flex align-items-center justify-content-center gap-5 py-3">
                                <li><a href="index.html" title="Home" class="text-secondary text-decoration-none">Home</a></li>
                                <li><a href="#" title="Categories" class="text-secondary text-decoration-none">Categories</a></li>
                                <li><a href="#" title="Styles" class="text-secondary text-decoration-none">Styles</a></li>
                                <li><a href="#" title="About" class="text-secondary text-decoration-none">About</a></li>
                                
                                <?php if(isset($_SESSION['user'])): ?>
                                    <!-- Lien de deconnexion -->
                                    <li><a href="logout.php" title="Déconnexion" class="text-danger text-decoration-none">Se déconnecter</a></li>
                                <?php else: ?>
                                    <!-- Lien de connexion -->
                                    <li><a href="login.php" title="Connexion" class="text-warning text-decoration-none">Se connecter</a></li>
                                <?php endif; ?>

                                <!-- Affiche un lien vers l'administration seulement si le rôle est "ROLE_ADMIN" -->
                                <?php if(isset($_SESSION['user']) && $_SESSION['user']['role'] === 'ROLE_ADMIN'): ?>
                                    <li>
                                        <a href="admin/index.php" title="Administration" class="text-danger text-decoration-none">Administration</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>

                    <!-- Carousel -->
                    <div class="col-12">
                        <div class="row d-flex align-items-center">
                            <!-- Flèche de gauche -->
                            <div class="col-lg-3 d-none d-lg-block text-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left-short text-white" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                                </svg>
                            </div>

                            <!-- Image du carousel -->
                            <div class="col-12 col-lg-6 pt-4 pt-lg-0">
                                <img src="images/slide/03.jpg" alt="Image du slide" class="w-100 rounded carousel-img">
                            </div>

                            <!-- Flèche de droite -->
                            <div class="col-lg-3 d-none d-lg-block text-start">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-right-short text-white" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="gradient"></div>

        <main class="py-5">
            <div class="container">

                <!-- Message de bienvenue à l'utilisateur connecté -->
                <?php if(isset($_SESSION['user'])): ?>
                    <div class="alert alert-success">
                        Bonjour <?php echo $_SESSION['user']['firstname']; ?> <?php echo $_SESSION['user']['lastname']; ?> !
                        <a href="logout.php" title="Déconnexion">Se déconnecter</a>
                    </div>
                <?php endif; ?>

                <!-- Les articles de mon blog -->
                <div class="row">
                    
                    <?php foreach($articles as $article): ?>
                        <!-- Colonne contenant un article -->
                        <div class="col-12 col-lg-6 pb-5">
                            
                            <!-- L'article -->
                            <article>
                                <a href="article.php?id=<?php echo $article['id']; ?>" title="<?php echo $article['title']; ?>" class="text-dark text-decoration-none">
                                    <img src="images/upload/<?php echo $article['cover']; ?>" alt="<?php echo $article['title']; ?>" class="w-100 rounded">
                                    <h1 class="pt-2"><?php echo $article['title']; ?></h1>
                                </a>
                                <p class="text-secondary">
                                    <?php 
                                        $timestamp = strtotime($article['created_at']);
                                        echo date('d F Y', $timestamp); 
                                    ?>
                                </p>
                                <p class="py-2">
                                    <?php echo mb_strimwidth($article['content'], 0, 200, '...'); ?>
                                </p>
                                <div class="d-flex align-items-center gap-2">
                                    <a href="categories.php?category_id=<?php echo $article['category_id']; ?>" title="<?php echo $article['category']; ?>" class="badge rounded-pill bg-primary text-decoration-none">
                                        <?php echo $article['category']; ?>
                                    </a>
                                </div>
                            </article>
                        </div>
                    <?php endforeach; ?>
                    
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