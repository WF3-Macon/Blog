<?php

// Connexion à la BDD
require_once 'connexion.php';

// Chargement des dépendances Composer
require_once 'vendor/autoload.php';

// dump($_GET['id']);

// Nettoyage de la valeur reçue
$id = htmlspecialchars(strip_tags($_GET['id']));

/**
 * On "prépare" une requête SQL dès qu'une info externe
 * est transmise à celle-ci 
 */
$query = $db->prepare('SELECT posts.id, posts.title, posts.content, posts.cover, posts.created_at, posts.category_id, categories.name AS category, users.lastname, users.firstname FROM posts INNER JOIN categories ON categories.id = posts.category_id INNER JOIN users ON users.id = posts.user_id WHERE posts.id = :id ORDER BY posts.created_at DESC');
$query->bindValue(':id', $id, PDO::PARAM_INT);
$query->execute();

// Récupération d'un seul enregistrement
$article = $query->fetch();

// Si $article est égal à false...
if (!$article) {
    // ... redirection vers une page 404
    header('Location: 404.php');
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Philosophy. - <?php echo $article['title']; ?></title>

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
                <article>
                    <h1 class="h1 text-start text-lg-center"><?php echo $article['title']; ?></h1>
                    <div class="row pt-lg-2 justify-content-center">
                        <div class="col-12 col-lg-4 text-start text-lg-end">
                            <p class="text-secondary m-0"><?php echo date('d F Y', strtotime($article['created_at'])); ?></p>
                        </div>
                        <div class="col-12 col-lg-2">
                            <div class="d-lg-flex align-items-center justify-content-center gap-2">
                                <a href="categories.php?category_id=<?php echo $article['category_id']; ?>" title="<?php echo $article['category']; ?>" class="badge rounded-pill bg-primary text-decoration-none">
                                    <?php echo $article['category']; ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 text-lg-start">
                            <?php echo "{$article['firstname']} {$article['lastname']}"; ?>
                        </div>
                        <div class="col-12 py-5 text-center">
                            <img src="images/upload/<?php echo $article['cover']; ?>" alt="Image de l'article" class="rounded read-article-img">
                        </div>
                        <div class="col-12 col-lg-6 article">
                            <p class="fw-bold">Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor sunt sint sit nisi est eu exercitation incididunt adipisicing veniam velit id fugiat enim mollit amet anim veniam dolor dolor irure velit commodo cillum sit nulla ullamco magna amet magna cupidatat qui labore cillum sit in tempor veniam consequat non laborum adipisicing aliqua ea nisi sint. </p>
                            <p><?php echo $article['content']; ?></p>    
                        </div>
                    </div>
                </article>
            </div>
            <div class="container-fluid bg-light mt-5">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-6 py-5">
                        <h2 class="h3">Comments</h2>
                        <div class="row pt-4">
                            <div class="col-6">
                                <p class="m-0 fs-5 fw-bold">John Doe</p>
                            </div>
                            <div class="col-6 text-end">
                                <p class="m-0 text-secondary">January 1, 2022</p>
                            </div>
                            <div class="col-12 pt-2 pb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit id recusandae ex sit, amet, ad nemo vitae, fugit voluptas ducimus facere reiciendis neque. Expedita modi sunt, quas praesentium alias delectus?</div>
                        </div>

                        <div class="row pt-4">
                            <div class="col-6">
                                <p class="m-0 fs-5 fw-bold">John Doe</p>
                            </div>
                            <div class="col-6 text-end">
                                <p class="m-0 text-secondary">January 1, 2022</p>
                            </div>
                            <div class="col-12 pt-2 pb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit id recusandae ex sit, amet, ad nemo vitae, fugit voluptas ducimus facere reiciendis neque. Expedita modi sunt, quas praesentium alias delectus?</div>
                        </div>
                        
                        <div class="row pt-4">
                            <div class="col-6">
                                <p class="m-0 fs-5 fw-bold">John Doe</p>
                            </div>
                            <div class="col-6 text-end">
                                <p class="m-0 text-secondary">January 1, 2022</p>
                            </div>
                            <div class="col-12 pt-2 pb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit id recusandae ex sit, amet, ad nemo vitae, fugit voluptas ducimus facere reiciendis neque. Expedita modi sunt, quas praesentium alias delectus?</div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-12 col-lg-6 pb-5">
                        <h2 class="h3">Add a comment</h2>
                        <form action="#" class="comment_form pt-5">
                            <div class="comment_form__inputs">
                                <label for="author" class="d-block fw-lighter">Author</label>
                                <input type="text" name="author" id="author" class="d-block fs-5 py-2 mb-4 w-100 border-0 bg-transparent border-bottom" required>
                                <label for="email" class="d-block fw-lighter">Email</label>
                                <input type="email" name="email" id="email" class="d-block fs-5 py-2 mb-4 w-100 border-0 bg-transparent border-bottom" required>
                                <label for="comment" class="d-block fw-lighter">Comment</label>
                                <textarea name="comment" id="comment" cols="30" rows="10" class="d-block fs-5 py-2 mb-4 w-100 border-0 bg-transparent border-bottom" required></textarea>
                            </div>
                            <button type="submit" class="text-uppercase bg-dark text-white w-100 border-0 py-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <!-- Inclusion du footer de la page -->
        <?php require_once 'layouts/footer.php'; ?>
    </body>
</html>