# Projet Blog

## Installation

Effectuer une copie (fork) de ce projet sur son propre compte GitHub.  
Ensuite, cloner le projet dans le dossier `www` de Laragon.  
Enfin, depuis un terminal de commande, se rendre dans le dossier de son projet :

```bash
cd my_folder
```

Installer les dépendances avec Composer :

```bash
composer install
```

## Base de données

Importer la base de données en utilisant le fichier SQL `blog.sql` situé dans le dossier `database`.

Modifier les valeurs de connexion dans le fichier `connexion.php` si nécessaire.

Lancer l'enregistrement des fixtures en lançant depuis le navigateur le fichier `fixtures.php`.