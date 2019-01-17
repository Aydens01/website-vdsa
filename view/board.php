<?php
include(Path::view(array('includes', 'head.php')));
include(Path::view(array('includes', 'plugin.php')));
//$connexion = new DB;
//$connexion->test();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Tableau de bord</title>
        <?= $head ?>
        <?= $plugin ?>
        <link href="<?= htmlspecialchars(Path::asset(array('css','custom','board.css')))?>" rel="stylesheet">
        <link href="<?= htmlspecialchars(Path::asset(array('css','custom','mapstyle.css')))?>" rel="stylesheet">

        <script src="<?= htmlspecialchars(Path::asset(array('js','custom/map.js')))?>"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAz47ssUwT9xcrgHto9FVdM4b4Oyp4AZ-g&callback=initMap" async defer></script>
        
    </head>
    <body>
        <!--==================================
        sidebar
        ===================================-->
        <div class="sidebar">
            <div>
            <div id="avatar">
                <img src="<?= htmlspecialchars(Path::asset(array('avatars','VDSAClub.PNG')))?>" alt=""/>
            </div>
            <div><p id="statistique">Statistiques</p> </div>
            </div>
            <div id="nom">
              <div> <a href="/admin">Back Office</a> <p>
              <?php
                    $user = $_SESSION["user"];
                    echo $user->getMail();
                ?>
              </p><a href="?logout">Déconnexion</a></div>
            </div>
        </div>
        <!-- sidebar -->
        <!--==========================
            Formulaire1 Section
        ============================-->
        <section id="formulaire">
            <div class="intro-content">
                <div class="Global">
                    <div id="admin">
                    <div class="select">
                        <select id="Représentant">
                            <option value="0">Représentant</option>
                            <option value="représentant1">nom prenom</option>
                            <option value="représentant2">nom prenom</option>
                        </select>
                    </div>
                    <div class="select">
                        <select id="Magasin">
                            <option value="0">Magasin</option>
                            <option value="magasin1">nom</option>
                            <option value="magasin2">nom</option>
                        </select>
                    </div>
                    </div>
                </div>
                <div class="Global">
                    <div class="form-group">
                        <div class="select">
                            <select id="frequence" class="target">
                                <option value="annuel">State - Global clients annuel</option>
                                <option value="mensuel">State - Global clients mensuel</option>
                            </select>
                        </div>
                    </div>
                    <div class="toggle">
                        <input class="target" type="radio" name="options" value="CA" id="CA"/>
                        <label for="CA">Chiffre d'affaire</label>
                        <input class="target" type="radio" name="options" value="marge" id="marge" />
                        <label for="marge">Marge</label>
                    </div>
                </div>
            </div>
        </section>
        <!-- #formulaire1 -->
        <!--==========================
            Formulaire2 Section
        ============================-->
        <section id="formulaire2">
            <div class="intro-content">
                <div class="Global">
                    <input type="text" class="champ target" id="client" placeholder="Rechercher un n° de compte client (tous par default)">
                    <div id="FamilleSousFamille">
                        <div class="form-group target" >
                            <div class="select">
                                <select id="famille">
                                    <option value="0">Famille (toutes par default)</option>
                                    <?php
                                        for ($i=1; $i < sizeof($data["famille"]); $i++) {
                                            if (strlen($data["famille"][$i][1]) > 2){
                                                echo '<option value="'.$data["famille"][$i][0].'">'.$data["famille"][$i][1].'</option>"';
                                            }
                                        }       
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group target">
                            <div class="select">
                                <select id="sousFamille">
                                    <option value="0">Sous Famille (toutes par default)</option>
                                    <?php
                                        for ($i=1; $i < sizeof($data["sousFamille"]); $i++) {
                                            if (strlen($data["sousFamille"][$i][3]) > 2){
                                                echo '<option value="'.$data["sousFamille"][$i][0].'">'.$data["sousFamille"][$i][3].'</option>"';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- #formulaire2 -->
        <!--==========================
            Graph Section
        ============================-->
        <section id="graph">
            <div class="intro-content">
                <div id="ici" class="border">
                
                </div>
            </div>
        </section>
        <!-- #graph -->
        <!--==========================
            Maths section
        =========================-->

        <section id="maths">
            <div class="CSV"> 
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#analyse" aria-pressed="false" autocomplete="off" name="buttonCSV" id="mathsButton">
                    Analyse statistique
                </button> 
                <div class="modal fade" id="analyse" tabindex="-1" role="dialog" aria-labelledby="analyseLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Analyses statistiques</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="correlFaCA">Corrélation familles et chiffre d'affaire :  0.0134</div>
                            <div id="correlFama">Corrélation familles et marge : 0.0070</div>
                            <div id="correlSFaCA">Corrélation sous-familles et chiffre d'affaire : 0.0042</div>
                            <div id="correlSFama">Corrélation sous-familles et marge :  0.0021</div>
                            <div id="correlCAma">Corrélation chiffre d'affaire et marge : -0.0055 </div>
                            <div id="dataCA"> <span id="averageCA">Moyenne du chiffre d'affaire : 65.91</span> et <span id="medianCA">Médiane du chiffre d'affaire : 27.90</span> </div>
                            <div id="dataMa"> <span id="averageMa">Moyenne de la marge : 33.70</span> et <span id="medianMa">Médiane de la marge : 33.33</span> </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="Geolocalisation"> 
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id = "geo">
                    Géolocalisation
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Géolocalisation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="screen">
                                <div id="map">
                                    Map
                                </div>
                                <div id="legend">
                                    <div id="title-info">Informations</div>
                                    <div id="infos">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--#maths -->
        <!--==========================
            Stat Section
        ============================-->
        <section id="chiffres">
            <div class="intro-content">
                <h2>Chiffres clés annuels</h2>
                <div id=chiffresAnnuels>
                    <div id="clients"><h3><strong> Clients </strong></h3>    
                        <?php
                            $anneeN = $data["clientN"][0][0];
                            $anneeN1 = $data["clientN1"][0][0];
                            $variation = (($anneeN - $anneeN1)/$anneeN1)*100;
                        ?>
                    <div id="clientpercent"><?php echo round($variation,2) . "%"; ?></div>
                    <div id="clientdiv"><?php echo $anneeN1 . "/" . $anneeN; ?></div>
                    </div>
                        
                        
                    
                    <div id="Chiffre"><h3><strong>Chiffre</strong></h3>
                        <?php
                            $chiffreN = $data["margeCATotalN"][0][0];
                            $chiffreN1 = $data["margeCATotalN1"][0][0];
                            $variation = (($chiffreN - $chiffreN1)/$chiffreN)*100;
                        ?>
                        <div id="clientpercent"><?php echo round($variation,2) . "%"; ?></div>
                        <div id="clientdiv"><?php echo $chiffreN1 . "/" . $chiffreN; ?></div>            
                    </div>
                    <div id="Marge"><h3><strong>Marge</strong></h3>
                        <?php
                            $margeN = $data["margeCATotalN"][0][1];
                            $margeN1 = $data["margeCATotalN1"][0][1];
                            $variation = (($margeN - $margeN1)/$margeN)*100;
                        ?>
                        <div id="clientpercent"><?php echo round($variation,2) . "%"; ?></div>
                        <div id="clientdiv"><?php echo $margeN1 . "/" . $margeN; ?></div> 
                    </div>
                    <!--

                    
                </div>
                <h2>Chiffres clés mensuels</h2>
                <div id=chiffresmensuels>
                    <div id="chiffreclients"><h3>Chiffre par client</h3></div>
                    <div id="Marge"><h3>Marge</h3></div>
                </div>
                -->
            </div>
        </section>
        <!-- #stat -->
        <!--==========================
            Footer
        ============================-->
        <footer id="footer">
            <div class="container">
            <div class="statistique">
                Statistiques
            </div>
            <div class="nom">
                <div><p>Nom Prénom</p><a href="#">Déconnexion</a></div>
            </div>
            </div>
        </footer>
        <!-- #footer -->
		 <?php
			if(isset($_GET['logout'])) {
				session_unset();
			}
		?>
        <script src="<?= htmlspecialchars(Path::asset(array('js','custom/chart.js')))?>"></script>
    </body>
</html>