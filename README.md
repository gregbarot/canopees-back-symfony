# Back Symfony/API Platform Canopées

## Prérequis

Avant d’installer le projet, il faut avoir :

PHP compatible avec la version Symfony du projet ;
Composer ;
MySQL ou MariaDB ;
Git ;
un serveur local type Symfony CLI, WAMP, XAMPP ou équivalent.

## Installation

Installer les dépendances :
composer install

## Configuration de l’environnement local

Créer un fichier .env.local à la racine du projet.

Exemple :

APP_ENV=dev
APP_DEBUG=1
APP_SECRET=secret_local_a_modifier

DATABASE_URL="mysql://root:@127.0.0.1:3306/canopees?serverVersion=8.0&charset=utf8mb4"

Adapter DATABASE_URL selon la configuration MySQL locale.

## Création de la base de données

Créer la base avec Doctrine :
php bin/console doctrine:database:create

Exécuter les migrations :
php bin/console doctrine:migrations:migrate

Chargement des données initiales
php bin/console doctrine:fixtures:load

Attention : cette commande purge la base avant de recharger les données.

## Lancer le serveur local

symfony server:start

L’API est ensuite accessible à l’adresse :
http://127.0.0.1:8000/api

Le back-office est accessible à l’adresse :
http://127.0.0.1:8000/admin


## Back-office EasyAdmin

L’accès au back-office est protégé par authentification.

Seuls les utilisateurs ayant le rôle suivant peuvent accéder à l’administration :

ROLE_ADMIN

