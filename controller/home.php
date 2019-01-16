<?php
/**
 * home.php -- home class
 * 
 * @author Parau Emmanuel
 * @date 17.09.2018
 * @description
 *  Is a controller, is called when the user is authentified, calls the home view
 * @TODO
 * 
 * @FIXME
 */
class home extends Controller
{	
	/**
     * Is the default method, calls the home view
	 *
     */
    public function index($role = '')
    {
		if ($_SESSION['user']->getRole()!="guest"){
			$famille = $this->model('boardModel')->famille();
			$sousFamille = $this->model('boardModel')->sousFamille();
			$clientN = $this->model('boardModel')->clientAnneeN("2017");
			$clientN1 = $this->model('boardModel')->clientAnneeN("2016");
			$margeCATotalN = $this->model('boardModel')->margeCATotal("2017");
			$margeCATotalN1 = $this->model('boardModel')->margeCATotal("2016");
			$this->view('board',array(
				'famille' => $famille,
				'sousFamille' => $sousFamille,
				'clientN' => $clientN,
				'clientN1' => $clientN1,
				'margeCATotalN'=> $margeCATotalN,
				'margeCATotalN1'=> $margeCATotalN1,
				'role' => $role

			));
		}else{
			header('Location: /');
		}
    }
}