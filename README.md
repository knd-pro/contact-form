# Formulaire de contact

## Description

Site web comprenant :
- Un Front-Office pour la connexion ou l'enregistrement des utilisateurs (formulaire de contact).<br/>
  Une fois que l'utilisateur a rempli et validé le formulaire, il est inscrit et peut modifier ses informations dans une page dédiée.
- Un Back-Office pour la gestion des utilisateurs par l'administrateur (accès spécifique).<br/>
  Ce dernier dispoe d'un tableau listant les utilisateurs. Il peut supprimer ou modifier n'importe quel utilisateur dans une page spécifique.

Le formulaire de contact suit les règles suivantes :
- L'email est validé dès sa saisie dans le formulaire.
- Le numéro de téléphone doit contenir 10 chiffres (normes françaises).
- Les commentaires saisis par l'utilisateur seront affichés avec les sauts de ligne présents dans le texte.
- Le champs ville sera rempli automatiquement si une ville correspondant au code postal a été trouvée.


Projet réalisé avec :
```
PHP 8.1.8
Node.js 18.7.0
Laravel 9.23.0
Vue 3.2.37
Bootstrap 5.2.0
```

## Build


Commandes a éxécuter pour installer le projet

```
npm install
php artisan migrate:fresh --seed
```
## Lancement

```
npm run dev
```

Et dans un autre terminal

```
php artisan serve
```
## Tests

Identifiants de l'administrateur :
```
id: admin
mdp: 12345678
```
Identifiants d'un utilisateur :
```
id: marcjne
mdp: Axe4885-
```
