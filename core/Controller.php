<?php
/**
 * Controller.php -- Controller class
 * 
 * @author Parau Emmanuel
 * @date 17.09.2018
 * @description
 *  base class inherited by the other controllers 
 *  'physically' calls the models and views 
 * @TODO 
 *
 * @FIXME Needs the functions to display the error messages
 */
class Controller
{	
	/**
     * Physically calls the model $model
     * 
     * @return Controller::model the model that should be used in that controller
     */
    public function model($model)
    {
        require_once '../model/' . $model . '.php';
        return new $model();
    }
	
	/**
     * Physically calls the view $view
     * 
     */
    public function view($view, $data = array())
    {
        require_once '../view/' . $view . '.php';
    }

}