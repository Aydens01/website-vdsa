<?php

class login extends Controller
{
    public function index($role = '')
    {
        $this->view('login',array('url' => 'login/verify'));
    }
	public function verify()
	{
		$identify = $this->model('loginModel');
		
		if (isset($_POST)){
			$authentified = $identify->verif($_POST['mail'],$_POST['psw']);
			
			if ($authentified){
				$this->view('home');
			}
			else{
				$this->view('login',array('url' => ''));
			}
		}
		else{
			$this->view('login',array('url' => ''));
		}
	}
}