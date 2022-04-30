# projet_tutoré_Gpe2_2022
## Tâches à réaliser:
- Ahmed
- Jordy

  -backend
- Amirouche 

### GIT ET GITHUB

Afin de connaitre les différentes versions de notre code qui seront effectuées tout au long de notre projet, nous allons utiliser un logiciel de versionning: `Git` et un logiciel de gestion de version: `GitHub`.

Dans un premier temps il faut télécharger et installer `Git` depuis leur [site](https://git-scm.com/downloads) puis s'inscrire sur [GitHub](https://github.com/). On utilisera l'invite de commande ou la console `Git Bash` pour effectuer les commandes.

Afin d'initialiser git il faut le configurer et renseigner un nom et une adresse mail: `git config --global user.name` + mon_nom et `git config --global user.email` + mon_email. Cette action est nécéssaire pour relier git avec le compte GitHub. Pour afficher le nom et l'email: `git config --global --list`.

Lorsque on souhaite versionner son travail en local on initialise `Git`, tout en étant sur le bon dossier avec la commande `git init`. Un dossier `.git` est crée.

Pour ajouter toutes les modifications d'un travail sur une machine en local: `git add .` ou `git add` + nom_du_fichier.

Pour connaitre l'état de nos fichiers: `git status`.
 
Après avoir pousser les fichiers en zone d'index, on crée un nouveau commit afin de sauvegarder le travail avec la commande suivante: `git commit -m` + "détails du commit". Puis il faut pousser les modifications vers un serveur distant: `git push -u origin main`.

Sur GitHub il faut crée un nouveau repository (dépôt) et le relié au projet en ajoutant le lien du dépôt à la commande suivante: `git clone` + lien_GitHub.com.

Pour travailler en groupe les collaborateurs doivent cloner le dépot (repository) en utilisant la commande `git clone` + l'adresse du dépot.
Après avoir demander l'autoristaion au propriétaire du dépot, les membres du groupe peuvent à présent travailler sur le projet. Ceci permettra d'effectuer des changements sur la branche principale (main). 
Pour récuprérer la version la plus récente, le collaborateur tape la commande suivante en s'assurant d'être sur le bon dossier: `git pull`.
Afin d'éviter les conflits sur les différents changements effectués sur un même fichier, chaque collaborateur créera sa propre branche et travaillera ainsi plus sereinement sur une caractéristique du projet.

Pour créer une nouvelle branche: `git branch` + nom de la branche.

Changer de branche: `git checkout` + nom de la branche.

Afin d'envoyer la nouvelle branche en local sur le dépot distant: `git push --set-upstream origin ` + nom de la branche.

Après avoir testé et validé le code de la branche secondaire, il faudra fusionner la branche du correctif et poussez le résultat en production: `git merge` + nom de la branche.
  
  -Frontend
  
### PUBLISH-QUESTION.PHP

Faire un formulaire dans lequel l'utilisateur pourra publier sa question
Inclure le fichier securityAction.php pour la sécurité du compte,l'utilisateur devra s'authentifier.
J'inclus avec la fonction 'include' le fichier navbar.php pour afficher la barre de navigation.

### NAVABAR.PHP

Dans bootstrap je récupère le code d'une barre de navigation en modifiant les noms et les liens dans le fichier navbar.php et je l'inclus dans mon fichier publish-question.php.

### INDEX.PHP
Dans ce fichier qui sera ma page d'accueil, j'inclus les fichiers head.php et navbar.php
