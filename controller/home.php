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
        $this->view('home',array('role' => $role));
    }
}