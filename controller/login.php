<?php
/**
 * login.php -- login class
 * 
 * @author Parau Emmanuel
 * @date 25.09.2018
 * @description
 *  Is a controller, is the default controller, calls the views login & home
 * @TODO
 * 
 * @FIXME
 */
class login extends Controller
{	
	/**
     * Is the default method, calls the login view
	 *
     */
    public function index()
    {
		if ($_SESSION['user']->getRole()!="guest"){
			header('Location: /home'); 
		}else{
			$this->view('login',array('url' => 'login/verify'));
		}
    }
	
	/**
     * Is called from the default login.php view, checks if the form is filled, if the logins are correct
	 * calls home, else calls itself.
     * 
     */
	public function verify()
	{
		$identify = $this->model('loginModel');
		
		if (isset($_POST)){
			$authentified = $identify->verif($_POST['mail'],$_POST['password']);
			
			if ($authentified){
				header('Location: /home'); 
			}
			else{
				$this->view('login',array('url' => '','state'=>'wrong credentials'));
			}
		}
		else{
			$this->view('login',array('url' => '','state'=>'post not set'));
		}
	}
}