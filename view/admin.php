 <?php
include(Path::view(array('includes', 'head.php')));
include(Path::view(array('includes', 'plugin.php')));
echo $data['state'];
?>



<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Espace Administrateur</title>
    <?= $head ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link href="<?php // htmlspecialchars(Path::asset(array('css','custom','bo.css')))?>" rel="stylesheet"> -->
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
                  <th scope="col">Mail</th>
                  <th scope="col">Mot de passe</th>
                  <th scope="col">Rôle</th>
				  <th scope="col">id vendeur</th>
                </tr>
              </thead>
              <tbody>
				<?php
					$info_array = $data['user_info'];
					$row = 1;
					$role_array = array("trader"=>"Commercial", "manager"=>"Directeur", "admin"=>"Administrateur");
					//print_r($info_array);
					foreach ($info_array as $info => $val){
						if($val["id"]==$_SESSION['user']->getId()){
							$fullname=$val['firstname']." ".$val['name'];
						}
						echo "<tr>
						  <th scope='row'>".$row."</th>
						  <td>".$val["email"]."</td>
						  <td>".$val["password"]."</td>
						  <td>".$role_array[$val["role"]]."</td>
						  <td>".$val["id_vendeur"]."</td>
						</tr>";
						$row ++;
					}
				?>
              </tbody>
            </table>
          </div>

          <div class="col-xs-12"><h2>Ajouter un nouvel utilisateur</h2></div>
          <div class="col-xs-12 col-md-6"><form method="post" action="<?= $data['url_add'] ?>">
            <div class="form-group">
              <label for="login_ajout">Mail :</label>
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
            <form method="post" action="<?= $data['url_rmv'] ?>"><form>
              <label for="login_supp">Mail :</label>
              <input type="text" id="login_supp" name="login_supp" class="form-control"/>

              <input name="supprimer" type="submit" value="Supprimer">
            </form>
          </div>
        </div>
        <!--<div class="row">
          <div class="col-xs-12"><h2>Modifier un utilisateur</h2></div>
          <div class="col-xs-12 col-md-6">
            <form method="post" action="traitement_bo.php"><form>
              <label for="login_modif">Login :</label>
              <input type="text" id="login_modif" name="login_modif" class="form-control"/>
              <br>
              <input name="modifier" type="submit" value="Modifier">
          </form></div>
        </div> -->
        <div class="row">
          <div class="col-xs-12"><h2>Télécharger un fichier en amont</h2>
          <div class="col-xs-12 col-md-6">
			<form action="<?= $data['url'] ?>" method="post" enctype="multipart/form-data">
				
				<div class="container">
					<div class="form-group">
						<label for="somename"><b>Importez un fichier csv (limit 8mo)</b></label>
						<input type="file" class="form-control-file" name="csv" value="" />
					</div>
				
					<?php
						//<input type="submit" name="submit" value="Save" /></form>
					?>
					<button class="btn btn-primary" type="submit">Envoyer</button>
				</div>
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
      </div>
      <div class="nom">
          <div><p><?= $fullname ?></p><a href="?logout">Déconnexion</a></div>
      </div>
    </div>
  </footer>
  <!-- #footer -->
	 <?php
    if(isset($_GET['logout'])) {
		session_unset();
    }
    ?>
  </body>
</html>
