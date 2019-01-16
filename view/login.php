<!--
 <?php
include(Path::view(array('includes','head.php')));
include(Path::view(array('includes','plugin.php')));
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Identification</title>
        <?= $head ?>
        
    </head>

    <body data-spy="scroll" data-target=".navbar" data-offset="50">
	
        <div id="top"></div>
        <form action="<?= $data['url'] ?>" method="post">
			<div class="container">
				<div class="form-group">
					<label for="uname"><b>Mail</b></label>
					<input class="form-control" type="text" placeholder="Enter Username" name="mail" required>
				</div>
				
				<div class="form-group">
					<label for="psw"><b>Password</b></label>
					<input class="form-control" type="password" placeholder="Enter Password" name="password" required>
				</div>
				<button class="btn btn-primary" type="submit">Login</button>
				<label>
				<input type="checkbox" checked="checked" name="remember"> Remember me
				</label>
			</div>

			<div class="container" style="background-color:#f1f1f1">
				<button type="button" class="cancelbtn">Cancel</button>
				<span class="psw">Forgot <a href="#">password?</a></span>
			</div>
		</form> 
    </body>
</html>

  
-->
<?php
include(Path::view(array('includes','head.php')));
include(Path::view(array('includes','plugin.php')));
?>



<!DOCTYPE html>
<html>
    <head>
        <title>Identification</title>
        <?= $head ?>
        <link href="<?= htmlspecialchars(Path::asset(array('css','custom','login.css')))?>" rel="stylesheet">
    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="50">
      <div class="page">
        <div class="sidebar">
        <div id="avatar">
                <img src="<?= htmlspecialchars(Path::asset(array('avatars','VDSAClub.PNG')))?>" alt=""/>
              </div>
          <div>
            <section class="login-form">
              <form method="post" action="<?= $data['url'] ?>" role="login">
                      <label for="uname"  class="text-uppercase"><b>Mail</b></label>
                         <input type="email" id="login" name="email" required class="form-control input-lg" placeholder="james@exemple.net" />
                  <label for="psw" class="text-uppercase"><b>Mot de passe</b></label>
                        <input type="password" class="form-control input-lg" id="mdp" placeholder="Mot de passe" required="" />
                      <div class="custom-control custom-checkbox">
                      <input type="checkbox" checked="checked" name="remember" class="custom-control-input" id="defaultChecked2">
                            <label class="custom-control-label" for="defaultChecked2"><small> Se souvenir de moi</small></label>
                      </div>
                <div class="pwstrength_viewport_progress">
                </div>
                <button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Se connecter</button>
                <div class="test">
                        <a href="" id="cancel">Annuler</a>
                        <span class="psw"><a href="#"> Mot de passe oublié</a></span>
                </div>
              </form>
            </section>
          </div>
        </div>
        <div class="container">
          <div class="row" id="pwd-container">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            </div>
          </div>
        </div>
      </div>
    </body>
</html>
