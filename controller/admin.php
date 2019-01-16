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
		$this->view('admin',array('url' => 'admin/import'));
    }
	
	/**
     * Is called from the default admin.php view, checks if the form is filled verifies the csv content
     * 
     */
	public function import()
	{
		$operations = $this->model('adminModel');
		if (isset($_FILES['csv']) && $csv['error']==0){
			$verified = $operations->verify($_FILES['csv']);
			if ($verified){
				$operations->send($_FILES['csv']);
				$this->view('admin',array('url'=>'','state'=>'sent'));
				
			}else{
				$this->view('admin',array('url'=>'','state'=>'invalid format, missing field or wrong separator'));
			}
		}else{
			$this->view('admin',array('url'=>'','state'=>'csv no set'));
		} 
	}
}