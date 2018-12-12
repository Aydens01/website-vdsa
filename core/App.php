<?php

/**
 * App.php -- App class
 * 
 * @author Parau Emmanuel
 * @date 17.09.2018
 * @description
 *  The App class contains the core of the Zero Framework (c)
 *  
 * @TODO
 * 
 * @FIXME
 */
class App
{
	/**
     * @param string $controller the controller called, default is 'login'
     */
    protected $controller = 'login';
	
	/**
     * @param string $index the method called, default is 'index'
     */
    protected $method = 'index';
	
	/**
     * @param array $params the parameters that are passed on the method $method called from the controller $controller, default is an empty array
     */
    protected $params = array();

	/**
     * Initializes the App class
     * parses url, if nothing is found it calls the default controller with the default method
     * if something is found in the url the string between the first '/' and the second '/' it will check if the corresponding file exists, if it does the controller will change
	 * if something is found between the second '/' and the third '/' it will check if the method exists, if it does the method will change
	 * the rest will be passed in an array as a parameter to the called method with the called controller
     */
    public function __construct()
    {
        $url = $this->parseUrl();

        if (file_exists('../controller/' . $url[0] . '.php')){
            $this->controller = $url[0];
            unset($url[0]);
        }
        require_once '../controller/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        if (isset($url[1])){
            if (method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }
		
        $this->params = $url ? array_values($url) : array();
        call_user_func_array(array($this->controller, $this->method), $this->params);
    }
	
	/**
	 * Returns an array from the url 
	 * will transform "web.com/this/is/something" into array { 0:'this', 1:'is', 2:'something'}
     * 
     * @return array contains the url minus the website path and each element is a 'split' of the url on the caracter '/'
     */
    public function parseUrl()
    {
        if (isset($_GET['url']))
        {
            $url =  $_GET['url'];
            return explode('/', filter_var(rtrim($url, '/'), FILTER_SANITIZE_URL));
        }
    }
}