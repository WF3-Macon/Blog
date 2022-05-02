<?php

/**
 * fixtures.php
 * Insertion de fausses données en BDD
 */

// Chargement de l'autoloader de Composer
require_once 'vendor/autoload.php';

// Connexion à la BDD
require_once 'connexion.php';

// Création de l'instance de Faker
$faker = Faker\Factory::create('fr_FR');

// Désactive la vérification des clés étrangères
$db->query('SET FOREIGN_KEY_CHECKS = 0');

// Vide la table "categories"
$db->query('TRUNCATE categories');

// Vide la table "users"
$db->query('TRUNCATE users');

// Vide la table "posts"
$db->query('TRUNCATE posts');

// active la vérification des clés étrangères
$db->query('SET FOREIGN_KEY_CHECKS = 1');

/**
 * Insertion des données dans la table "categories"
 */

for ($i = 0; $i < 10; $i++) {
    $query = $db->prepare('INSERT INTO categories (name) VALUES (:name)');
    $query->bindValue(':name', $faker->colorName);
    $query->execute();
}

/**
 * Insertion des données dans la table "users"
 */
for ($i = 0; $i < 20; $i++) {
    $createdAt = $faker->dateTimeBetween('-3 years');

    $query = $db->prepare('INSERT INTO users (lastname, firstname, email, password, role, created_at) VALUES (:lastname, :firstname, :email, :password, :role, :created_at)');
    $query->bindValue(':lastname', $faker->lastName);
    $query->bindValue(':firstname', $faker->firstName);
    $query->bindValue(':email', $faker->unique()->email); // Permet une valeur unique
    $query->bindValue(':password', password_hash('secret', PASSWORD_ARGON2I));
    $query->bindValue(':role', $i === 0 ? 'ROLE_ADMIN' : 'ROLE_USER');
    $query->bindValue(':created_at', $createdAt->format('Y-m-d'));
    $query->execute();
}

/**
 * Insertion des données dans la table "posts"
 */
for ($i = 0; $i < 30; $i++) {
    $createdAt = $faker->dateTimeBetween('-3 years');

    $query = $db->prepare('INSERT INTO posts (user_id, category_id, title, content, cover, created_at) VALUES (:user_id, :category_id, :title, :content, :cover, :created_at)');
    $query->bindValue(':user_id', rand(1, 20), PDO::PARAM_INT);
    $query->bindValue(':category_id', rand(1, 10), PDO::PARAM_INT);
    $query->bindValue(':title', $faker->realText(30));
    $query->bindValue(':content', $faker->realText(1200));
    $query->bindValue(':cover', '01.jpg');
    $query->bindValue(':created_at', $createdAt->format('Y-m-d'));
    $query->execute();
}
