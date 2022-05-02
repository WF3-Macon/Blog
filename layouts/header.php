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

                    <!-- Affiche le carousel seulement sur la page d'accueil du blog -->
                    <?php if($_SERVER['SCRIPT_NAME'] === '/index.php'): ?>
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
                    <?php endif; ?>

                </div>
            </div>
        </header>
        <div class="gradient"></div>