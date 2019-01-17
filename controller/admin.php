<?php
/**
 * admin.php -- admin class
 * 
 * @author Parau Emmanuel
 * @date 25.09.2018
 * @description
 *  Is a controller, calls the views admin & home
 * @TODO
 * 
 * @FIXME
 */
class admin extends Controller
{	
	/**
     * Is the default method, calls the admin view
	 *
     */
    public function index()
    {
		if ($_SESSION['user']->getRole()=="admin"){
			$operations = $this->model('adminModel');
			$info = $operations -> get_info() ;
			$this->view('admin',array('url' => 'admin/import','user_info' =>$info,'url_rmv'=>'admin/remove'));
		}else{
			header('Location: /login');
		}
    }
	
	/**
     * Is called from the default admin.php view, checks if the form is filled verifies the csv content
     * 
     */
	public function import()
	{
		if ($_SESSION['user']->getRole()=="admin"){
			$operations = $this->model('adminModel');
			$info = $operations -> get_info() ;
			if (isset($_FILES['csv']) && $csv['error']==0){
				$verified = $operations->verify($_FILES['csv']);
				if ($verified){
					$operations->send($_FILES['csv']);
					$this->view('admin',array('url'=>'','state'=>'sent','url_rmv'=>'/remove','user_info' =>$info));
				}else{
					$this->view('admin',array('url'=>'','state'=>'invalid format, missing field or wrong separator','url_rmv'=>'/remove','user_info' =>$info));
				}
			}else{
				$this->view('admin',array('url'=>'','state'=>'csv file not set','url_rmv'=>'/remove','user_info' =>$info));
			}
		}else{
			header('Location: /login');
		}	 
	}
	
	public function remove()
	{
		if ($_SESSION['user']->getRole()=="admin"){
			$operations = $this->model('adminModel');
			$info = $operations -> get_info() ;
			if (isset($_POST["login_supp"])&&strlen($_POST['login_supp'])){
				$operations -> delete($_POST["login_supp"]);
				
				$this->view('admin',array('url'=>'/import','state'=>'\"deleted\"','url_rmv'=>'','user_info' =>$info));
			}else{
				$this->view('admin',array('url'=>'/import','state'=>'login_supp not set','url_rmv'=>'','user_info' =>$info));
			}
		}else{
			header('Location: /login');
		}
	}
}