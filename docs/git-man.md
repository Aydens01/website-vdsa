# Manuel Git

## Installation

**Sous Windows** : installer git bash (déjà installer sur le pc de l'école). Lien d'installation : [here](https://gitforwindows.org/).

**Sous Ubuntu** : git est déjà disponible sur votre terminal.

## GitHub

Créez-vous un compte et faites-vous ajouter au projet. Lien vers GitHub : [here](https://github.com/).

## Configuration 

Ouvrez votre terminal (git bash sur Windows) :
```sh
$ git config --global user.name "Prénom Nom"
$ git config --global user.email prenomnom@example.com #votre mail github
$ git config --global core.editor vi # (‘;
```

## Pour travailler sur le projet

Ouvrez le terminal (git bash sur Windows), si vous n'avez pas installé le projet : click [here](docs/installation.md)

```sh
# Placez-vous dans le dossier du projet
$ cd website-vdsa
# Placez-vous sur la branche dev sur laquelle nous allons travailler
$ git checkout dev
```

## Les commandes à connaitre

```sh
# Pour visualiser les fichiers modifiés ou créés du repository
$ git status
# Pour visualiser l'ensemble des commits effectués sur le projet
$ git log
```

Si vous venez de finir de travailler et que vous avez sauvegardé vos fichiers, faire :

```sh
# On enregistre les modifications en local sur git
$ git add .
$ git stash
# On récupère le projet en ligne
$ git pull origin dev
$ git stash pop
# On commit nos modifications avec une description
$ git commit -m "Votre message"
# On envoie notre travail sur le serveur
$ git push origin dev
```
-------
*Note : Si vous voulez faire un beau message de commit, Emmanuel se fera un plaisir de vous expliquer comment il faut faire.*

-------

