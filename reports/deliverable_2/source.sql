DROP TABLE IF EXISTS utilisateur;
CREATE TABLE utilisateur(
   id INT PRIMARY KEY,
   nom VARCHAR(30),
   prenom VARCHAR(30),
   email VARCHAR(50),
   password VARCHAR(30),
   rôle VARCHAR(30),
   CONSTRAINT password CHECK (password BETWEEN 8 AND 99),
);

DROP TABLE IF EXISTS client;
CREATE TABLE client(
   code INT PRIMARY KEY,
   codePostal INT,
   ville VARCHAR(30),
   idUtilisateur INT,
   FOREIGN KEY fk_utilisateur(idUtilisateur) REFERENCES utilisateur(id)
);

DROP TABLE IF EXISTS commande;
CREATE TABLE commande(
   id INT PRIMARY KEY,
   date VARCHAR(15),
   codePostal INT,
   ville VARCHAR(30),
   margeTotal INT,
   chiffreAffaire INT,
   idUtilisateur INT,
   FOREIGN KEY fk_utilisateur(idUtilisateur) REFERENCES utilisateur(id)
);

DROP TABLE IF EXISTS famille;
CREATE TABLE famille(
   codeFam INT PRIMARY KEY,
   libFam VARCHAR(30)
);

DROP TABLE IF EXISTS sousFamille;
CREATE TABLE sousFamille(
   codeSfam INT PRIMARY KEY,
   libSfam VARCHAR(30),
   idFam INT,
   FOREIGN KEY fk_famille(idFam) REFERENCES famille(codeFam)
);

DROP TABLE IF EXISTS article;
CREATE TABLE article(
   id INT PRIMARY KEY,
   dateAchat VARCHAR(30),
   idFam INT,
   FOREIGN KEY fk_famille(idFam) REFERENCES famille(codeFam)
);

DROP TABLE IF EXISTS composition;
CREATE TABLE composition(
   marge INT,
   idCommande INT,
   idArticle INT,
   FOREIGN KEY fk_commande(idCommande) REFERENCES commande(id),
   FOREIGN KEY fk_articler(idArticle) REFERENCES article(id)
);
