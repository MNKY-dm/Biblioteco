# Biblioteco

Biblioteco est une application web de gestion de bibliothèque développée avec Laravel.  
Elle permet la consultation d’un catalogue, la gestion des emprunts, la gestion du panier, ainsi qu’un accès différencié selon les rôles utilisateur, notamment pour les espaces staff et administrateur. 

## Lien d'accès : http://77.42.122.72/home

## Comptes de démonstration

Compte administrateur :

- Email : `admin@biblioteco.bts`
- Mot de passe : `H3l1c0pt3re.`

Compte staff :

- Email : `staff@biblioteco.bts`
- Mot de passe : `H3l1c0pt3re.`

Compte utilisateur :

- Email : `user@biblioteco.bts`
- Mot de passe : `H3l1c0pt3re.`

Ces comptes peuvent être adaptés selon les données présentes dans la base au moment du déploiement.

## Fonctionnalités

- Consultation du catalogue de livres.
- Recherche d’ouvrages.
- Accès à une page de détail pour chaque livre.
- Gestion d’un panier.
- Confirmation d’emprunt.
- Consultation des emprunts de l’utilisateur.
- Retour d’un emprunt.
- Gestion du profil utilisateur.
- Espace staff pour la modification des livres.
- Espace administrateur pour la gestion des utilisateurs. 

## Stack technique

- PHP 8.2+
- Laravel 12
- MySQL
- Vite 7
- Tailwind CSS 4
- PHPUnit 11 

## Dépendances principales

Le projet utilise notamment les dépendances suivantes :

- `laravel/framework`
- `laravel/tinker`
- `laravel-lang/lang`

En développement, le projet utilise aussi :

- `phpunit/phpunit`
- `laravel/pint`
- `laravel/pail`
- `laravel/sail`
- `fakerphp/faker`
- `mockery/mockery`
- `barryvdh/laravel-ide-helper` 

## Installation

Cloner le dépôt :

```bash
git clone https://github.com/MNKY-dm/Biblioteco.git
cd Biblioteco
```

Installer les dépendances PHP :
```bash
composer install
```

Installer les dépendances front :

```bash
npm install
```

Créer le fichier d’environnement :

```bash
cp .env.example .env
```

Générer la clé de l’application :

```bash
php artisan key:generate
```

Configurer la base de données et la remplir dans le fichier .env, puis lancer les migrations et les seeders :

```bash
php artisan migrate --seed
```

Compiler les assets front :

```bash
npm run build
```

Lancer le serveur de développement :

```bash
php artisan serve
``` 

## Commandes utiles

Lancer les tests :

```bash
php artisan test
```

Lancer le projet en mode développement avec les services prévus par le projet :

```bash
composer run dev
```

Lancer le build front :

```bash
npm run build
```


## Accès à l’application

Lien d’accès à l’application :  
`À renseigner`

## Configuration de production

Pour un déploiement en production, il faut notamment vérifier que l’environnement est bien configuré et que le mode debug est désactivé, car Laravel recommande de ne pas exposer les informations de débogage en production. 

Exemple :

```env
APP_ENV=production
APP_DEBUG=false
