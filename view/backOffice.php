<?php
include(Path::view(array('includes', 'head.php')));
include(Path::view(array('includes', 'plugin.php')));
?>



<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Espace Administrateur</title>
    <?= $head ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="<?= htmlspecialchars(Path::asset(array('css','custom','bo.css')))?>" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <?= $plugin ?>
  </head>
  <body>



    <div class="container"><!-- class contenant toutes les lignes principales (obligatoire) -->
    <div class="row"><!-- Première ligne -->
      <div class="col-md-10 col-xs-11"><!-- le reste prend 10 colonnes pour les ordinateurs et 11 pour les autres appareille -->
        <!-- si vous faites le compte avec la bordure, cela fait 12 colonne -->
        <div class="row"><!-- première ligne dans la partie de droite -->
          <div class="col-xs-12"><!-- Douze colonne pour que cela prenne tous l'espace disponible dans la partie de droite. -->
            <h1>Back Office</h1>

          <h2>Liste des utilisateurs</h2></div>
        </div>

        <div class="row"><!-- deuxième ligne dans la partie de droite -->
          <div class="col-xs-12">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Identifiant</th>
                  <th scope="col">Mot de passe</th>
                  <th scope="col">Rôle</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark Joul</td>
                  <td>Otto</td>
                  <td>Commercial</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob Steiner</td>
                  <td>Thornton</td>
                  <td>Directeur</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Larry Barns</td>
                  <td>the Bird</td>
                  <td>Administrateur</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="col-xs-12"><h2>Ajouter un nouvel utilisateur</h2></div>
          <div class="col-xs-12 col-md-6"><form method="post" action="traitement_bo.php">
            <div class="form-group">
              <label for="login_ajout">Login :</label>
              <input type="text" id="login_ajout" name="login_ajout" class="form-control"/>
            </div>

            <div class="form-group">
              <label for="role_ajout">Role :</label>
              <input type="text" id="role_ajout" name="role_ajout" class="form-control"/>
            </div>

            <div class="form-group">
              <label for="mdp_ajout">Mot de passe :</label>
              <input type="text" id="mdp_ajout" name="mdp_ajout" class="form-control"/>
            </div>

            <input name="ajouter" type="submit" value="Ajouter"/>
          </form></div>
        </div>

        <div class="row">
          <div class="col-xs-12"><h2>Supprimer un utilisateur</h2></div>
          <div class="col-xs-12 col-md-6">
            <form method="post" action="traitement_bo.php"><form>
              <label for="login_supp">Login :</label>
              <input type="text" id="login_supp" name="login_supp" class="form-control"/>

              <input name="supprimer" type="submit" value="Supprimer">
            </form>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12"><h2>Modifier un utilisateur</h2></div>
          <div class="col-xs-12 col-md-6">
            <form method="post" action="traitement_bo.php"><form>
              <label for="login_modif">Login :</label>
              <input type="text" id="login_modif" name="login_modif" class="form-control"/>
              <br>
              <input name="modifier" type="submit" value="Modifier">
          </form></div>
        </div>
        <div class="row">
          <div class="col-xs-12"><h2>Upload un fichier</h2>
          <div class="col-xs-12 col-md-6">
            <form action="upload.php" method="post">
              <input type="file" class="custom-file-input" id="uploadfichier" >
              <label class="custom-file-label" for="uploadfichier"></label>
              <br>
              <input type="submit" name="Upload" value="Insérer">
            </form>
          </div>

          </div>

        </div>
      </div>
    </div>
    <!--==========================
    Footer
    ============================-->

  </div>
  <footer id="footer">
    <div class="container">
      <div class="statistique">
        Back Office
      </div>
      <div class="nom">
          <div><p>Nom Prénom</p><a href="#">Déconnexion</a></div>
      </div>
    </div>
  </footer>
  <!-- #footer -->

  </body>
</html>
