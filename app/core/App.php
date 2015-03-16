<?php

class App
{
	//defaults values for controller, method & params
	protected $controller = 'HomeController';
	protected $method = 'index';
	protected $params = [];
	//function called whenever an instance of App is create
	public function __construct()
	{
		$url = $this->parseUrl();
		//check if the first element of the url is a known controller
		//if not the default value will be used
		if(file_exists('../app/controllers/' .$url[0].'Controller.php'))
		{
			$this->controller = $url[0].'Controller';
			unset($url[0]);
		}
		//create an instance of a controller (given one if it exists or HomeController)
		require_once '../app/controllers/'.$this->controller.'.php';
		$this->controller = new $this->controller;

		//if a second parameter is given
		if(isset($url[1]))
		{
			//check if it fit a method inside the controller previously created
			if(method_exists($this->controller, $url[1]))
			{
				echo 'OK';
			}
		}
	}
	//cleans and explodes the url w. "/"
	//The return is an array w. all the arguments 
	public function parseUrl()
	{
		if(isset($_GET['url'])) {
			return $url = explode('/',filter_var(rtrim($_GET['url'], '/'),FILTER_SANITIZE_URL));
		}
	}
}