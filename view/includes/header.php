<?php
ob_start();
?>

<nav class="navbar navbar-expand-md navbar-light sticky-top bg-light border-success">

    <a class="navbar-brand" href="#">LoveYourCuisine</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">

    <ul class="navbar-nav m-auto">
        <li class="nav-item active">
        <a class="nav-link text-success" href="/recipes">Nos recettes</a>
        </li>

        <li class="nav-item active">
        <a class="nav-link text-success" href="/how">Comment ça marche ?</a>
        </li>

        <li class="nav-item active">
        <a class="nav-link text-success" href="/cooks">LoveYourCuisine, c'est vous !</a>
        </li>
        
    </ul>

    <hr class="mt-2 mb-3 d-lg-none d-block">

	<?php
	if (!empty($data['role'])){
		if ($data['role']=='user' || $data['role']=='cuisto'){
			 $access = new profilModel;
            $getid = 2;
            $informations_users=$access ->read_users($getid);
			$str='<div class="dropdown">
        <a class="btn btn-light btn-block dropdown-toggle d-flex flex-row align-items-center" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="'.htmlspecialchars(Path::asset(array('avatars','img_test1.png'))).'" class="img-thumbnail" style="width:50px;height:50px;">
            <div class="font-weight-bold ml-1 d-flex flex-wrap">
                Bonjour,&nbsp<span class="text-success">Username here</span>
            </div>
        </a>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="/profile"><i class="fas fa-user"></i> Mon profil</a>
            <a class="dropdown-item" href="#"><i class="fas fa-shopping-basket"></i> Mon panier <span class="badge badge-secondary" id="basketNumber">0</span></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i> Se déconnecter</a>
			</div>
		</div>';
		}elseif($data['role']=='admin'){
			$str='<div class="dropdown">
        <a class="btn btn-light btn-block dropdown-toggle d-flex flex-row align-items-center" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="'.htmlspecialchars(Path::asset(array('avatars','img_test1.png'))).'" class="img-thumbnail" style="width:50px;height:50px;">
            <div class="font-weight-bold ml-1 d-flex flex-wrap">
                Bonjour,&nbsp<span class="text-success">'.$informations_users['name'].'</span>
            </div>
        </a>
        
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="/profile"><i class="fas fa-user"></i> Mon profil</a>
            <a class="dropdown-item" href="#"><i class="fas fa-shopping-basket"></i> Mon panier <span class="badge badge-secondary" id="basketNumber">0</span></a>

            <!-- ADMIN -->
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"><i class="fas fa-cogs"></i> Administrateur</a>

            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i> Se déconnecter</a>
        </div>
    </div>';
		} else {
			$str ='<div class="">
			<a data-toggle="modal" href="" class="btn btn-outline-dark btn-block font-weight-bold" data-target="#connect">Connexion</a>
			</div>';
			
		}
	}else{
		$str ='<div class="">
			<a data-toggle="modal" href="" class="btn btn-outline-dark btn-block font-weight-bold" data-target="#connect">Connexion</a>
			</div>';
	}
	echo $str;
	?>

</nav>

<?php
$header = ob_get_clean();
?>

