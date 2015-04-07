<?php
class Controller
{
	public function view($view, $data = [])
	{
		require_once '../app/views/'.$view.'View.php';
	}
	public function quitWithErrorTo($view, $error){
		http_response_code($error->getCode());
		$this->view($view, array("code"=>$error->getCode(), "log"=>$error->getLog()));
	}
}