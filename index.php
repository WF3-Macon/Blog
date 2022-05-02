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
        <!-- Inclusion du header de la page -->
        <?php require_once 'layouts/header.php'; ?>

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

        <!-- Inclusion du footer de la page -->
        <?php require_once 'layouts/footer.php'; ?>
    </body>
</html>